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
        $pedido = new Pedido();
    }
}
