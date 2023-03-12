<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'disponibilidade', 'valor', 'descricao'];

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

            if (isset($dados['imagens'])) {
                $manterImagens = isset($dados['mantem']) ? $dados['mantem'] : null;

                $resultado = ProdutoImagem::editar($produto, $dados['imagens'], $manterImagens);

                if (!$resultado) {
                    throw new Exception();
                }
            }
            
            return true;
        } catch (\Exception $e) {
            dd($e);
            return false;
        }
    }
}
