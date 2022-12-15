<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    
    public function cadastrar(Request $request) {
        $request->validate([
            'email' => 'required|email|max:300|unique:usuarios',
            'senha' => 'required|string|min:8'
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
