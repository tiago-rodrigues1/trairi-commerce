<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
    autorizacao params: $admin, $cliente, $anunciante
*/

Route::middleware('autorizacao:false,true,false')->group(function(){
    
    Route::get('/pedidos/listar', function () {
        return view('pedidos/listar');
    });

    Route::get('/pedidos/comprovar', function () {
        return view('pedidos/comprovar');
    });

    Route::get('/pedidos/novo', function () {
        return view('pedidos/novo');
    });

    Route::get('/usuario/notificacoes', function () {
        return view('usuario/notificacoes');
    });
    
    Route::get('/usuario/perfil', function() {
        return view('/usuario/perfil');
    });
});

Route::middleware('autorizacao:false,false,true')->group(function(){
    
    Route::get('/produtos/listar', function() {
        return view('produtos/listar');
    });    

    Route::get('/produtos/adicionar', function () {
        return view('produtos/adicionar');
    });
    
    Route::get('/usuario/notificacoes', function () {
        return view('usuario/notificacoes');
    });

    Route::get('/usuario/perfil', function() {
        return view('/usuario/perfil');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/busca/resultados', function () {
    return view('busca/resultados');
});

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/usuario/logar', [UsuarioController::class, 'logar']);

Route::get('/usuario/deslogar', [UsuarioController::class, 'deslogar']);
