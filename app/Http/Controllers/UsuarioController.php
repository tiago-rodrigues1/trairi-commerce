<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
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

        if ($request->tipoCadastro == 'cliente')
        {
            $u = Usuario::salvar($request->except('_token'));
        }
        else
        {
            /*$request->validate([
                '' => ''
            ]);*/

            $u = Usuario::salvar($request->except('_token'), $request->except('_token')['anunciante']);
        }

        
        if ($u != null) {
            // autenticar
            session()->put('usuario', $u);
            session()->put('acesso', $u->getAcesso());
        }
        else {
            // mensagem de erro
        }
        return redirect('/');
    }

    public function logar(Request $request) {
        $request->validate([
            'email' => 'required|email|max:300',
            'senha' => 'required|string',
        ]);

        $u = Usuario::autenticar($request->except('_token'));
        if ($u != null) {
            session()->put('usuario', $u);
            session()->put('acesso', $u->getAcesso());
            return redirect('/');
        } else {
            return redirect('/')->withErrors(['msg' => 'Erro de autenticação']);
        }
        
    }

    public function deslogar() {
        session()->flush();

        return redirect('/');
    }

}
