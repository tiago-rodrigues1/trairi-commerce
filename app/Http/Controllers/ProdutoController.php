<?php

namespace App\Http\Controllers;

use App\Exceptions\ExcluirProdutoException;
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
            'taxa_de_entrega' => 'required|numeric',
            'imagens.*' => 'required|image|mimes:jpg,png,jpeg,svg,webp',
        ]);

        $p = Produto::salvar($request->except('_token'));

        if ($p) {
            $status = ['type' => 'success', 'msg' => 'Cadastro feito com sucesso!'];
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível cadastrar seu produto. Por favor, tente novamente'];
        }

        return redirect('/produtos/listar')->with(compact('status'));
    }

    public function editar(Request $request) {
        $request->validate([
            'nome' => 'string|max:100',
            'descricao' => 'string|max:300',
            'valor' => 'numeric',
            'taxa_de_entrega' => 'required|numeric',
            'imagens.*' => 'image|mimes:jpg,png,jpeg,svg,webp|max:1000',
        ]);

        $resultado = Produto::atualizar($request->id, $request->all());

        if ($resultado) {
            $status = ['type' => 'success', 'msg' => 'Produto atualizado com sucesso!'];
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível atualizar seu produto. Por favor, tente novamente'];
        }

        return redirect('/produtos/listar')->with(compact('status'));
    }

    public function renderAdicionar() {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos/adicionar', compact('categorias'));
    }

    public function renderListar() {
        $produtos = session()->get('usuario')->anunciante->produtos()
        ->where('bloqueado', '0')
        ->orderBy('nome')
        ->get();

        return view('produtos/listar', compact('produtos'));
    }

    public function renderWelcome() {
        $produtos = Produto::orderBy('created_at')->where('bloqueado', '0')->get();

        if (session()->get('acesso') == 'cliente') {
            $pedidosParaComprovar = session()->get('usuario')->cliente->pedidos()->where('estado', 'finalizado')->get();

            if (sizeof($pedidosParaComprovar) > 0) {
                return view('welcome', compact('produtos', 'pedidosParaComprovar'));
            }
        }

        return view('welcome', compact('produtos'));
    }

    public function renderDetalhar($id) {
        $produto = Produto::findOrFail($id);

        $comentarios= $produto->comentariosClientes()->where('bloqueado', '0')->orderByDesc('pivot_created_at')->get();

        if ($produto->bloquado) {
            return;
        }

        $html = view('components/produto-detalhes', compact('produto', 'comentarios'))->render();

        return $html;
    }

    public function renderEditar($id) {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('/produtos/editar', compact('produto', 'categorias'));
    }

    public function arquivar($id) {
        $produto = Produto::findOrFail($id);

        $resultado = $produto->arquivar();

        if ($resultado instanceof ExcluirProdutoException) {
            $status = ['type' => 'error', 'msg' => $resultado->getMessage()];
        } else if ($resultado == true) {
            $status = ['type' => 'success', 'msg' => 'Produto deletado com sucesso!'];
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível deletar seu produto. Por favor, tente novamente'];
        }

        return redirect('/produtos/listar')->with(compact('status'));
    }
}
