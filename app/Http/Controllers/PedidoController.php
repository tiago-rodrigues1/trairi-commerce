<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoController extends Controller {
    public function renderCarrinho() {
        $u = session()->get('usuario');
        return view('pedidos/carrinho', compact('u'));
    }

    public function adicionarItem($id) {
        $produto = Produto::find($id);

        $GLOBALS['anunciante_id'] = $produto->anunciante->id;
        
        $result = array_filter(session()->get('carrinho', []), function($item) {
            return $item->anunciante->id !== $GLOBALS['anunciante_id'];
        });

        if (count($result) > 0) {
            $status = ['type' => 'error', 'msg' => 'Você só pode adicionar produtos de um mesmo anunciante'];
            return redirect('/pedidos/carrinho')->with(compact('status'));
        } 
        
        session()->push('carrinho', $produto);
        return redirect('/pedidos/carrinho');
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
        
        return redirect('/pedidos/carrinho');
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
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível enviar seu pedido'];
        }

        return redirect('/')->with(compact('status'));
    }

    public function renderHistoricoPedidos() {
        $pedidosEstado = Pedido::distinct('estado')->get();
        $filters = [];
        $filters[0] = ['label' => ['Estados', 'pedidos#estado']];

        foreach($pedidosEstado as $pedido) {
            $filters[0]['options'][] = $pedido->estado;
        }

        $acesso = session()->get('acesso');

        if ($acesso == 'cliente') {
            $pedidos = session()->get('usuario')->cliente->pedidos()->orderByDesc('created_at')->get();

        } else if ($acesso == 'anunciante') {
            $pedidos = session()->get('usuario')->anunciante->pedidos()->orderByDesc('created_at')->get();
        }

        return view('pedidos/listar', compact('pedidos', 'filters'));
    }

    public function renderDetalharPedido($pedido_id) {
        $pedido = Pedido::findOrFail($pedido_id);

        $html = view('components.pedido-detalhes', compact('pedido'))->render();

        return $html;
    }

    public function atualizarPedido(Request $request, $pedido_id) {
        $pedido = Pedido::findOrFail($pedido_id);

        $novoEstado = $request->acao;

        if ($pedido->atualizar($novoEstado)) {
            $status = ['type' =>'success','msg' => 'Pedido atualizado com sucesso!'];
        } else {
            $status = ['type' =>'error','msg' => 'Não foi possível atualizar o pedido!'];
        }

        return redirect('/pedidos/listar/')->with(compact('status'));
    }
}
