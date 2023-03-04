<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {
    use HasFactory;

    protected $fillable = ['tipo_de_pagamento_id', 'cep_destino', 'cidade_destino', 'bairro_destino', 'endereco_destino'];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function anunciante() {
        return $this->belongsTo(Anunciante::class);
    }

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'contems')->withPivot('quantidade')->withTimestamps();
    }

    public function addProduto ($produto_id, $quantidade) {
        try {
            $this->produtos()->attach($produto_id, ['quantidade' => $quantidade]);

            return true;
        } catch (Exception $e) {
            echo $e;

            return false;
        }
    }

    public static function salvar($dados) {
        try {
            $cliente = session()->get('usuario')->cliente;

            $pedido = new Pedido($dados);
            $pedido->estado = 'Pendente';

            if ($dados['observacao']) {
                $pedido->observacao = $dados['observacao'];
            }

            $anunciante = Produto::findOrfail($dados['produto_id'][0])->anunciante;

            $pedido->cliente()->associate($cliente);
            $pedido->anunciante()->associate($anunciante);
            $pedido->save();

            for ($i = 0; $i < count($dados['produto_id']); $i++) {
                $pedido->addProduto($dados['produto_id'][$i], $dados['quantidade'][$i]);
            }

            session()->forget('carrinho');

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}
