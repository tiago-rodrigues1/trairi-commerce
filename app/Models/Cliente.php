<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function cliente() {
        return $this->belongsTo(Usuario::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function anunciantes() {
        return $this->belongsToMany(Anunciante::class, 'cliente_avalia_anunciantes')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosAvaliados() {
        return $this->belongsToMany(Produto::class, 'cliente_avalia_produtos')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosFavoritados() {
        return $this->belongsToMany(Produto::class, 'favoritas')->withTimestamps();
    }

    
}
