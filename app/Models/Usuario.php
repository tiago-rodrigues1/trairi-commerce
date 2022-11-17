<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'senha', 'nome', 'nascimento', 'telefone', 'endereco', 'genero'];

    protected $hidden = ['senha'];

    public function buscas() {
        return $this->hasMany(Busca::class);
    }

    public function anunciante() {
        return $this->hasOne(Anunciante::class);
    }

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function cliente() {
        return $this->hasOne(Cliente::class);
    }

}
