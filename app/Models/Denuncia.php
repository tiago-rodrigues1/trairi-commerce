<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'data_hora'];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}
