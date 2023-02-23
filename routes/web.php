<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

/* Rotas de cliente */

Route::middleware('autorizacao:false,true,false')->group(function() {
    Route::get('/pedidos/comprovar', function () {
        return view('pedidos/comprovar');
    });

    Route::get('/pedidos/novo', [PedidoController::class, 'renderPedidoNovo']);

    Route::get('/pedidos/carrinho/{id}', [PedidoController::class, 'adicionarItem']);
});

/* Rotas de anunciante */

Route::middleware('autorizacao:false,false,true')->group(function() {
    Route::get('/produtos/listar', [ProdutoController::class, 'renderListar']);

    Route::get('/produtos/adicionar', [ProdutoController::class, 'renderAdicionar']);

    Route::post('/produtos/cadastrar', [ProdutoController::class, 'cadastrar']);
});

/* Rotas de cliente e anunciante */
Route::middleware('autorizacao:false,true,true')->group(function() {
    Route::get('/usuario/perfil', [UsuarioController::class, 'renderPerfil']);

    Route::get('/usuario/notificacoes', function () {
        return view('usuario/notificacoes');
    });

    Route::get('/pedidos/listar', [PedidoController::class, 'renderPedidoNovo']);

    Route::get('/produtos/detalhar/{id}', [ProdutoController::class, 'renderDetalhar']);
});

/* Rotas abertas */

Route::get('/', [ProdutoController::class, 'renderWelcome']);

Route::get('/busca/resultados', function () {
    return view('busca/resultados');
});

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/usuario/logar', [UsuarioController::class, 'logar']);

Route::get('/usuario/deslogar', [UsuarioController::class, 'deslogar']);
