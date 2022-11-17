<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'disponibilidade', 'valor', 'taxa_entrega', 'descricao'];

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
}
