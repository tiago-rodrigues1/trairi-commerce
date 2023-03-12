<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProdutoImagem extends Model {
    use HasFactory;

    protected $fillable = ['path'];
    protected $table = "produtos_imagens";

    public function produto() {
        return $this->belongsTo(Produto::class);
    }

    public static function salvar($imgs, $produto) {
        foreach ($imgs as $img) {
            $path = $img->store('imagens', 'public');

            $pi = new ProdutoImagem(['path' => $path]);
            $produto->imagens()->save($pi);
        }
    }

    public static function editar($produto, $novasImagens, $manterImagens = null) {
        $imagensProduto = $produto->imagens;

        try {
            foreach ($imagensProduto as $imagem) {
                if (!is_null($manterImagens)) {
                    if (!(in_array($manterImagens, $imagem->path))) {
                        Storage::delete('public/'.$imagem->path);
                        $imagem->delete();
                    }
                } else {
                    Storage::delete('public/'.$imagem->path);
                    $imagem->delete();
                }
            }
    
            foreach ($novasImagens as $img) {
                $path = $img->store('imagens', 'public');
    
                $pi = new ProdutoImagem(['path' => $path]);
                $produto->imagens()->save($pi);
            }

            return true;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
    }
}
