<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'descricao', 'telefone', 'cidade', 'cep', 'bairro', 'endereco', 'funcionamento', 'cpf/cnpj'];

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

    public function criarProduto($nome, $disponibilidade, $valor, $taxa, $descricao, $categoria) {

    }

    public function excluirProduto($p) {

    }

    public function finalizarProduto($p) {
        
    }

    public function atualizarEstado($p, $status) {
        
    }

}
