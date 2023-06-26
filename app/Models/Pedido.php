<?php

namespace App\Models;

use App\Mail\NovoPedido;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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

    public function tipoDePagamento() {
        return $this->belongsTo(TipoDePagamento::class);
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
            $tipoPagamento = TipoDePagamento::findOrFail($dados['tipo_de_pagamento_id']);

            $pedido = new Pedido($dados);
            $pedido->estado = 'Pendente';

            if ($dados['observacao']) {
                $pedido->observacao = $dados['observacao'];
            }

            $anunciante = Produto::findOrfail($dados['produto_id'][0])->anunciante;

            $pedido->cliente()->associate($cliente);
            $pedido->anunciante()->associate($anunciante);
            $pedido->tipoDePagamento()->associate($tipoPagamento);
            $pedido->save();

            for ($i = 0; $i < count($dados['produto_id']); $i++) {
                $pedido->addProduto($dados['produto_id'][$i], $dados['quantidade'][$i]);
            }

            session()->forget('carrinho');

            Mail::to($pedido->anunciante->usuario->email)->send(new NovoPedido($pedido));

            return true;
        } catch (Exception $e) {
            dd($e);
            return false;
        }
    }

    public function atualizar ($novoEstado) {
        try {
            $this->estado = $novoEstado;

            $this->save();

            Mail::to($pedido->cliente->usuario->email)->send(new UpdatePedido($pedido));

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
