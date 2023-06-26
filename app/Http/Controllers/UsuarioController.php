<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Anunciante;

class UsuarioController extends Controller {
    
    public function cadastrar(Request $request) {
        $request->validate([
            'tipoCadastro' => 'required',
            'nome' => 'required|max:200',
            'email' => 'required|email|max:300|unique:usuarios',
            'senha' => 'required|string|min:8',
            'confirmacaoSenha' => 'required|string|min:8|same:senha',
            'nascimento' => 'required|date',
            'telefone' => 'required|max:15',
            'cep' => 'required|max:9',
            'cidade' => 'required|max:100',
            'bairro' => 'required|max:150',
            'endereco' => 'required|max:200',
            'genero' => 'required'
        ]);

        if ($request->tipoCadastro == 'cliente') {
            $u = Usuario::salvar($request->except('_token'));
        } else {
            $request->validate([
                'anunciante.nome_fantasia' => 'required|max:200',
                'anunciante.cpf_cnpj' => 'required|max:14|unique:anunciantes,cpf_cnpj',
                'anunciante.taxa_de_entrega' => 'numeric',
                'anunciante.descricao' => 'required|max:300',
                'anunciante.telefone' => 'required|string|max:11',
                'anunciante.cep' => 'required|max:8',
                'anunciante.cidade' => 'required|max:100',
                'anunciante.bairro' => 'required|max:100',
                'anunciante.endereco' => 'required|max:200',
                'anunciante.funcionamento' => 'required|max:100',
                'anunciante.instagram' => 'required|max:100',
                'anunciante.facebook' => 'required|max:100',
                'anunciante.whatsapp' => 'required|max:11',
                'anunciante.email_anunciante' => 'required|max:100'
            ]);
            
            $u = Usuario::salvar($request->except('_token'), $request->except('_token')['anunciante']);
        }

        
        if ($u != null) {
            session()->put('usuario', $u);
            session()->put('acesso', $u->getAcesso());

            return redirect('/')->with(['status' => ['type' => 'success', 'msg' => 'Cadastro feito com sucesso!']]);
        }
        else {
            return redirect('/')->withErrors(['msg' => 'Não foi possível realizar seu cadastro. Por favor, tente novamente']);
        }
    }

    public function atualizar(Request $request) {
        $request->validate([
            'nome' => 'required|max:200',
            //'email' => 'required|email|max:300|unique:usuarios',
            'nascimento' => 'required|date',
            'telefone' => 'required|max:15',
            'cep' => 'required|max:9',
            'cidade' => 'required|max:100',
            'bairro' => 'required|max:150',
            'endereco' => 'required|max:200',
            'genero' => 'required'
        ]);

        if ($request->session()->get('acesso') != 'anunciante') {
            $u = Usuario::atualizar($request->except('_token'));
        } else {
            $request->validate([
                'anunciante.nome_fantasia' => 'required|max:200',
                'anunciante.cpf_cnpj' => 'required|max:14',
                'anunciante.taxa_de_entrega' => 'numeric',
                'anunciante.descricao' => 'required|max:300',
                'anunciante.telefone' => 'required|max:11',
                'anunciante.cep' => 'required|max:8',
                'anunciante.cidade' => 'required|max:100',
                'anunciante.bairro' => 'required|max:100',
                'anunciante.endereco' => 'required|max:200',
                'anunciante.funcionamento' => 'required|max:100',
                'anunciante.instagram' => 'required|max:100',
                'anunciante.facebook' => 'required|max:100',
                'anunciante.whatsapp' => 'required|max:11',
                'anunciante.email_anunciante' => 'required|max:100'
            ]);
            
            $u = Usuario::atualizar($request->except('_token'), $request->except('_token')['anunciante']);
        }

        
        if ($u != null) {
            session()->put('usuario', $u);
            return redirect('/usuario/perfil')->with(['status' => ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso!']]);
        }
        else {
            return redirect('/usuario/perfil')->withErrors(['msg' => 'Não foi possível atualizar seu cadastro. Por favor, tente novamente']);
        }
    }

    public function logar(Request $request) {
        $request->validate([
            'email' => 'required|email|max:300',
            'senha' => 'required|string',
        ]);

        $u = Usuario::autenticar($request->except('_token'));

        if ($u instanceof Usuario) {
            session()->put('usuario', $u);
            session()->put('acesso', $u->getAcesso());
            return redirect('/')->with(['status' => ['type' => 'success', 'msg' => 'Bem-vindo(a)!']]);
        } else {
            return redirect('/')->withErrors(['msg' => $u->getMessage()]);
        }
        
    }

    public function deslogar() {
        session()->flush();

        return redirect('/');
    }

    public function renderPerfil() {
        $u = session()->get('usuario');
        $u->nascimento = explode(" ", $u->nascimento)[0];

        return view('/usuario/perfil', compact('u'));
    }

    public function buscar() {
        $u = session()->get('usuario');
        $termo = request('termo');

        $resultados = $u->fazerBusca($termo);

        if (is_null($resultados)) {
            return redirect('/')->withErrors(['msg' => 'Não foi possível realizar busca. Por favor, tente novamente']);
        }

        return view('/busca/resultados', compact('termo', 'resultados'));
    }

    public function favoritarProduto(Request $request, $id) {
        $p = Produto::findOrFail($id);
        $id_cliente = session()->get('usuario')->cliente->id;
        $c = Cliente::findOrFail($id_cliente);

        $isFavoritado = $c->produtosFavoritados->contains($id);

        if ($isFavoritado) {
            $c->desfavoritarProduto($p);
        } else {
            $c->favoritarProduto($p);
        }

        return redirect('/produtos/detalhar/'.$id);
    }

    public function renderFavoritos() {
        $id = session()->get('usuario')->cliente->id;
        $c = Cliente::findOrFail($id);
        $favoritos = $c->produtosFavoritados;

        return view('usuario/favoritos', compact('favoritos'));
    }

    public function renderPerfilAnunciante ($id) {
        $anunciante = Anunciante::findOrFail($id);
        $produtos = $anunciante->produtos;
        
        return view('usuario/perfilAnunciante', compact('produtos','anunciante'));
    }

}
