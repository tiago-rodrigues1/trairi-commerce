<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller {
    public function renderPedidoNovo() {
        $u = session()->get('usuario');
        return view('pedidos/novo', compact('u'));
    }

    public function adicionarItem($id) {
        $produto = Produto::find($id);

        $GLOBALS['anunciante_id'] = $produto->anunciante->id;
        
        $result = array_filter(session()->get('carrinho', []), function($item) {
            return $item->anunciante->id !== $GLOBALS['anunciante_id'];
        });

        if (count($result) > 0) {
            $status = ['type' => 'error', 'msg' => 'Você só pode adicionar produtos de um mesmo anunciante'];
            return redirect('/pedidos/items')->with(compact('status'));
        } 
        
        session()->push('carrinho', $produto);
        return redirect('/pedidos/items');
    }

    public function removerItem($id) {
        $produtos = session()->pull('carrinho', []);

        define('ID_TO_DELETE', $id);
        
        array_walk($produtos, function($produto, $key) use ($produtos) {
            if ($produto->id == ID_TO_DELETE) {
                unset($produtos[$key]);
                session()->put('carrinho', $produtos);
            }
        });
        
        return redirect('/pedidos/items');
    }

    public function novoPedido(Request $request) {
        $request->validate([
            'produto_id.*' => 'required',
            'quantidade.*' => 'required|numeric',
            'tipo_de_pagamento_id' => 'required',
            'observacao' => 'max:500',
            'cep_destino' => 'required|max:9',
            'cidade_destino' => 'required|max:100',
            'bairro_destino' => 'required|max:100',
            'endereco_destino' => 'required|max:300'
        ]);

        $pedido = Pedido::salvar($request->except('_token'));

        if ($pedido) {
            $status = ['type' => 'success', 'msg' => 'Pedido feito com sucesso!'];
            return redirect('/')->with(compact('status'));
        }
    }
}
