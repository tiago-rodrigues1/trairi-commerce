<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    
    public function cadastrar(Request $request)
    {
        $u = new Usuario([
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'nome' => $request->name,
            'nascimento' => Carbon::now(),//$request->birthday,
            'telefone' => $request->tel,
            'endereco' => $request->address,
            'genero' => $request->gender
        ]);
        $u->save();
        return redirect('/');
    }

}
