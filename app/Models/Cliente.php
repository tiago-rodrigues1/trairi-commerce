<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    use HasFactory;

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function anunciantesAvaliados() {
        return $this->belongsToMany(Anunciante::class, 'cliente_avalia_anunciantes')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosAvaliados() {
        return $this->belongsToMany(Produto::class, 'cliente_avalia_produtos')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosFavoritados() {
        return $this->belongsToMany(Produto::class, 'favoritas')->withTimestamps();
    }

    public function enviarPedido($p) {

    }

    public function comprovarFinalizacao($pedido, $avaliacao, $novoEstado) {
        DB::beginTransaction();
        try {
            $anunciante = $pedido->anunciante;
            $this->avaliarAnunciante($anunciante, $avaliacao);
            $pedido->atualizar($novoEstado);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function favoritarProduto($p) {
        try {
            $this->produtosFavoritados()->attach($p);
            session()->put('usuario', $this->usuario);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function desfavoritarProduto($p) {
        try {
            $this->produtosFavoritados()->detach($p);
            session()->put('usuario', $this->usuario);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function listarPedidos($filtrosUsuario) {
        $resultados = [];

        try {
            $resultados = $this->pedidos()->where(function($query) use($filtrosUsuario) {
                foreach ($filtrosUsuario as $key => $filtrosGrupos) {
                    if (!is_null($filtrosGrupos)) {
                        foreach ($filtrosGrupos as $value) {
                            [$tabela, $campo] = explode('-', $key);
                            $query->orwhere($tabela.'.'.$campo, $value);
                        }
                    }
                }
            });

            $resultados = $resultados->orderByDesc('created_at')->get();

            return $resultados;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function avaliarAnunciante($anunciante, $avaliacao) {
        try {
            $this->anunciantesAvaliados()->attach($anunciante->id, ['estrelas' => $avaliacao['estrelas'], 'comentario' => $avaliacao['comentario']]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function avaliarProduto($produto, $avaliacao) {
        try {
            if (!(isset($avaliacao['estrelas']))) {
                $avaliacao['estrelas'] = 0;
            }
            
            $this->produtosAvaliados()->attach($produto->id, ['estrelas' => $avaliacao['estrelas'], 'comentario' => $avaliacao['comentario']]);

            return true;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
    }

    public function editarAvaliacao ($a, $estrelas, $comentario) {
        
    }
}
