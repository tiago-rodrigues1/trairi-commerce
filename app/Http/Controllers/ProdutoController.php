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
            'imagens.*' => 'required|image|mimes:jpg,png,jpeg,svg,webp|max:1000',
        ]);

        $p = Produto::salvar($request->except('_token'));

        if ($p) {
            $status = ['type' => 'success', 'msg' => 'Cadastro feito com sucesso!'];
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível cadastrar seu produto. Por favor, tente novamente'];
        }

        return redirect('/produtos/listar')->with(compact('status'));
    }

    public function renderAdicionar() {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos/adicionar', compact('categorias'));
    }

    public function renderListar() {
        $produtos = session()->get('usuario')->anunciante->produtos()->orderBy('nome')->get();
        return view('produtos/listar', compact('produtos'));
    }

    public function renderWelcome() {
        $produtos = Produto::orderBy('created_at')->get();
        return view('welcome', compact('produtos'));
    }

    public function renderDetalhar($id) {
        $produto = Produto::find($id);

        $html = view('components/produto-detalhes', compact('produto'))->render();

        return $html;
    }
}
