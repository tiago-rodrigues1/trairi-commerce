<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {
    use HasFactory;

    protected $fillable = ['estado', 'data_hora', 'observaco'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'contems')->withPivot('quantidade')->withTimestamps();
    }

    public function addProduto ($produto, $quantidade) {
        try {
            $this->produtos()->attach($produto->id, ['quantidade' => $quantidade]);

            return true;
        } catch (Exception $e) {
            echo $e;

            return false;
        }
    }

    public function removerProduto($p) {
        
    }
}
