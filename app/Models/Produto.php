<?php

namespace App\Models;

use Exception;
use App\Exceptions\ExcluirProdutoException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'disponibilidade', 'valor', 'descricao', 'taxa_de_entrega'];

    public static function salvar($dados) {
        try {
            $c = Categoria::find($dados['categoria_id']);

            $p = new Produto($dados);
            $p->disponibilidade = true;
            $p->anunciante()->associate(session()->get('usuario')->anunciante);
            $p->categoria()->associate($c);
            $p->save();

            ProdutoImagem::salvar($dados['imagens'], $p);

            return true;
        } catch (\Exception $ex) {
            echo $ex;
            
            return false;
        }
    }

    public function anunciante() {
        return $this->belongsTo(Anunciante::class);
    }

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function clientesAvaliaram() {
        return $this->belongsToMany(Cliente::class, 'cliente_avalia_produtos')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function clientesFavoritaram() {
        return $this->belongsToMany(Cliente::class, 'favoritas')->withTimestamps();
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class, 'contems')->withPivot('quantidade')->withTimestamps();
    }

    public function imagens() {
        return $this->hasMany(ProdutoImagem::class);
    }

    public static function atualizar($produtoId, $dados) {
        try {
            $produto = Produto::findOrFail($produtoId);
            $produto->update($dados);

            if ($produto->bloqueado) {
                throw new Exception();
            }

            if (isset($dados['imagens'])) {
                $manterImagens = isset($dados['mantem']) ? $dados['mantem'] : null;

                $resultado = ProdutoImagem::editar($produto, $dados['imagens'], $manterImagens);

                if (!$resultado) {
                    throw new Exception();
                }
            }
            
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function arquivar() {
        try {
            if (count($this->pedidos) > 0) {
                foreach($this->pedidos as $pedido) {
                    if ($this->estado == 'Pendente' || $pedido->estado == 'Aceito' || $pedido->estado == 'Em andamento') {
                        throw new ExcluirProdutoException('Não é possível excluir produtos com pedidos em aberto. Finalize ou cancele o pedido.');
                    }
                }
            }

            $this->bloqueado = true;
            $this->save();

            return true;
        } catch (ExcluirProdutoException $ep) {
            return $ep;
        } catch (Exception $e) {
            return false;
        }
    }
}
