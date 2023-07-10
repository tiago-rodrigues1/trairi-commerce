<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunciante extends Model
{
    use HasFactory;

    protected $fillable = ['nome_fantasia', 'descricao', 'telefone', 'cidade', 'cep', 'bairro', 'endereco', 'funcionamento', 'cpf_cnpj', 'numero', 'instagram', 'whatsapp', 'facebook', 'email_anunciante'];

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
        return $this->belongsToMany(TipoDePagamento::class, 'aceitas')->withTimestamps();
    }

    public function avaliacoesClientes() {
        return $this->belongsToMany(Cliente::class, 'cliente_avalia_anunciantes')->withPivot('estrelas')->withTimestamps();
    }

    public function comentariosClientes() {
        return $this->belongsToMany(Cliente::class, 'cliente_comenta_anunciantes')->withPivot('comentario')->withTimestamps();
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
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
