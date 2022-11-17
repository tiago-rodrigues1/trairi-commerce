<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'estado', 'data_hora'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'contems')->withPivot('quantidade')->withTimestamps();
    }
}
