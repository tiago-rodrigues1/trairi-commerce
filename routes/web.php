<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;

/* Rotas de cliente */

Route::middleware('autorizacao:false,true,false')->group(function() {
    Route::get('/pedidos/comprovar', function () {
        return view('pedidos/comprovar');
    });

    Route::get('/pedidos/novo', function () {
        return view('pedidos/novo');
    });
});

/* Rotas de anunciante */

Route::middleware('autorizacao:false,false,true')->group(function() {
    
    Route::get('/produtos/listar', function() {
        return view('produtos/listar');
    });    

    Route::get('/produtos/adicionar', function () {
        return view('produtos/adicionar');
    });

    Route::post('/produtos/cadastrar', [ProdutoController::class, 'cadastrar']);
});

/* Rotas de cliente e anunciante */
Route::middleware('autorizacao:false,true,true')->group(function() {
    Route::get('/usuario/perfil', function() {
        return view('/usuario/perfil');
    });

    Route::get('/usuario/notificacoes', function () {
        return view('usuario/notificacoes');
    });

    Route::get('/pedidos/listar', function () {
        return view('pedidos/listar');
    });
});

/* Rotas abertas */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/busca/resultados', function () {
    return view('busca/resultados');
});

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/usuario/logar', [UsuarioController::class, 'logar']);

Route::get('/usuario/deslogar', [UsuarioController::class, 'deslogar']);
