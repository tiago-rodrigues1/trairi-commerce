<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class PedidoController extends Controller {
    public function renderPedidoNovo() {
        return view('pedidos/novo');
    }

    public function adicionarItem($id) {
        $produto = Produto::find($id);
        session()->push('usuario.carrinho', $produto);

        return redirect('/pedidos/novo');
    }
}
