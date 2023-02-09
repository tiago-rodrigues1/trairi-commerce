<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller {
    public function cadastrar(Request $request) {
        $request->validate([
            'is_servico' => 'required|boolean',
            'nome' => 'required|string|max:100',
            'descricao' => 'required|string|max:300',
            'categoria_id' => 'required',
            'valor' => 'required|numeric',
            'taxa_entrega' => 'required|numeric',
            'imagens' => 'required|image|mimes:jpg,png,jpeg,svg,webp|max:1000',
        ]);

        $p = Produto::salvar($request->except('_token'));
    }

    public function render() {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos/adicionar', compact('categorias'));
    }
}
