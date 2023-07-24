<?php

namespace App\Models;

use Error;
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
        return $this->belongsToMany(Anunciante::class, 'cliente_avalia_anunciantes')->withPivot('estrelas')->withTimestamps();
    }

    public function produtosAvaliados() {
        return $this->belongsToMany(Produto::class, 'cliente_avalia_produtos')->withPivot('estrelas')->withTimestamps();
    }

    public function anunciantesComentados() {
        return $this->belongsToMany(Anunciante::class, 'cliente_comenta_anunciantes')->withPivot('comentario')->withTimestamps();
    }

    public function produtosComentados() {
        return $this->belongsToMany(Anunciante::class, 'cliente_comenta_produtos')->withPivot('comentario')->withTimestamps();
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
            
            $responseAvaliacao = $this->avaliarAnunciante($anunciante, $avaliacao);
            $responseComentario = $this->comentarAnunciante($anunciante, $avaliacao);
            
            if ($responseAvaliacao && $responseComentario) {
                $pedido->atualizar($novoEstado);
            } else {
                throw new Error();
            }

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
            $this->anunciantesAvaliados()->attach($anunciante->id, ['estrelas' => $avaliacao['estrelas']]);

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
            
            $this->produtosAvaliados()->attach($produto->id, ['estrelas' => $avaliacao['estrelas']]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function comentarAnunciante($anunciante, $avaliacao) {
        try {
            $this->anunciantesComentados()->attach($anunciante->id, ['comentario' => $avaliacao['comentario']]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function editarAvaliacao ($a, $estrelas, $comentario) {
        
    }
}
