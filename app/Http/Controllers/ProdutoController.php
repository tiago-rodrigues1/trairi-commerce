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

    public function editar(Request $request) {
        $request->validate([
            'disponibilidade' => 'boolean',
            'nome' => 'string|max:100',
            'descricao' => 'string|max:300',
            'valor' => 'numeric',
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
        $filters = [];

        $produtos = session()->get('usuario')->anunciante->produtos()->orderBy('nome')->get();

        return view('produtos/listar', compact('produtos', 'filters'));
    }

    public function renderWelcome() {
        $produtos = Produto::orderBy('created_at')->get();
        return view('welcome', compact('produtos'));
    }

    public function renderDetalhar($id) {
        $produto = Produto::findOrFail($id);

        $html = view('components/produto-detalhes', compact('produto'))->render();

        return $html;
    }

    public function renderEditar($id) {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('/produtos/editar', compact('produto', 'categorias'));
    }

    public function excluir($id) {
        $produto = Produto::findOrFail($id);

        $resultado = Produto::deletar($produto);

        if ($resultado instanceof ExcluirProdutoException) {
            $status = ['type' => 'error', 'msg' => $resultado->getMessage()];
        } else if ($resultado == true) {
            $status = ['type' => 'success', 'msg' => 'Produto deletado com sucesso!'];
        } else {
            $status = ['type' => 'error', 'msg' => 'Não foi possível deletar seu produto. Por favor, tente novamente'];
        }

        return redirect('/produtos/listar')->with(compact('status'));
    }

    public function filtrar() {
        $filtros = request()->all();
        $produtos = Produto::join('anunciantes', 'anunciantes.id', '=', 'produtos.anunciante_id')
        ->join('aceitas', 'aceitas.anunciante_id', '=', 'anunciantes.id')
        ->join('tipo_de_pagamentos', 'tipo_de_pagamentos.id', '=', 'aceitas.tipo_de_pagamento_id')
        ->join('pedidos', 'pedidos.anunciante_id', '=', 'anunciantes.id');

        foreach ($filtros as $key => $value) {
            [$tabela, $campo] = explode('#', $key);
            $produtos->orwhere($tabela.'.'.$campo, $value[0]);
        }

        $p = $produtos->get();

        dd($p);
    }
}
