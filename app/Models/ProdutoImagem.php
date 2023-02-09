<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model {
    use HasFactory;

    protected $fillable = ['path'];

    public function produto() {
        return $this->belongsTo(Produto::class);
    }

    public function salvar($imgs, $produto) {
        foreach ($imgs as $img) {
            $path = $img->store('imagens', 'public');

            $pi = new ProdutoImagem(['path' => $path]);
            $produto->imagens()->save($pi);

            $pi->save();
        }
    }
}
