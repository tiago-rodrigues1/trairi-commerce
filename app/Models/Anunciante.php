<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'descricao', 'telefone_comercial', 'end_comercial', 'funcionamento', 'cpf/cnpj'];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function produtos() {
        return $this->hasMany(Produto::class);
    }

    public function canaisDeAtendimento() {
        return $this->belongsToMany(CanalDeAtendimento::class, 'possuis')->withPivot('user')->withTimestamps();
    }

    public function tiposDePagamento(){
        return $this->belongsToMany(TiposDePagamento::class, 'aceitas')->withTimestamps();
    }

    public function clientes() {
        return $this->belongsToMany(Cliente::class, 'cliente_avalia_anunciantes')->withPivot('estrelas', 'comentario')->withTimestamps();
    }


}
