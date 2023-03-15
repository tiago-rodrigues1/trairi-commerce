<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

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
                'anunciante[nome_fantasia]' => 'required|max:200',
                'anunciante[cpf_cnpj]' => 'required|max:14|unique:anunciantes',
                'anunciante[taxa_de_entrega]' => 'decimal:2',
                'anunciante[descricao]' => 'required|max:300',
                'anunciante[telefone]' => 'required|max:11',
                'anunciante[cep]' => 'required|max:8',
                'anunciante[cidade]' => 'required|max:100',
                'anunciante[bairro]' => 'required|max:100',
                'anunciante[endereco]' => 'required|max:200',
                'anunciante[funcionamento]' => 'required|max:100'
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

}
