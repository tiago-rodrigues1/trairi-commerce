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

        $u = Usuario::salvar($request->except('_token'));
        if ($u != null) {
            // autenticar
            session()->put('usuario', $u);
        }
        else {
            // mensagem de erro
        }
        return redirect('/');
    }

    public function logar(Request $request) {
        $u = Usuario::autenticar($request->except('_token'));
        if ($u != null) {
            session()->put('usuario', $u);
        }
        return redirect('/');
    }

}
