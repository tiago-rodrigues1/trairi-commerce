<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

/* Rotas de cliente */

Route::middleware('autorizacao:false,true,false')->group(function() {
    Route::get('/pedidos/carrinho', [PedidoController::class, 'renderCarrinho']);
    Route::get('/pedidos/carrinho/{id}', [PedidoController::class, 'adicionarItem']);
    Route::get('/pedidos/carrinho/remover/{id}', [PedidoController::class, 'removerItem']);
    Route::post('/pedidos/novo', [PedidoController::class, 'novoPedido']);
    Route::post('/pedidos/comprovar/{id}', [PedidoController::class, 'comprovar']);

    Route::post('/usuario/favoritar/{id}', [UsuarioController::class, 'favoritarProduto']);
    Route::get('/usuario/favoritos', [UsuarioController::class, 'renderFavoritos']);

    Route::post('/produtos/avaliar/{id}', [UsuarioController::class, 'avaliarProduto']);
});

/* Rotas de anunciante */

Route::middleware('autorizacao:false,false,true')->group(function() {
    Route::get('/produtos/listar', [ProdutoController::class, 'renderListar']);
    Route::get('/produtos/adicionar', [ProdutoController::class, 'renderAdicionar']);
    Route::get('/produtos/editar/{id}', [ProdutoController::class, 'renderEditar']);

    Route::post('/produtos/cadastrar', [ProdutoController::class, 'cadastrar']);
    Route::post('/produtos/editar/{id}', [ProdutoController::class, 'editar']);
    Route::delete('/produtos/arquivar/{id}', [ProdutoController::class, 'arquivar']);
});

/* Rotas de cliente e anunciante */
Route::middleware('autorizacao:false,true,true')->group(function() {
    Route::get('/usuario/perfil', [UsuarioController::class, 'renderPerfil']);

    Route::get('/pedidos/listar', [PedidoController::class, 'renderHistoricoPedidos'])->name('pedidos.listar');
    Route::get('/pedidos/detalhar/{pedido_id}', [PedidoController::class, 'renderDetalharPedido']);

    Route::get('/usuario/notificacoes', function () {
        return view('usuario/notificacoes');
    });

    Route::post('/pedidos/atualizar/{pedido_id}', [PedidoController::class, 'atualizarPedido']);

    Route::get('/produtos/filtrar', [ProdutoController::class, 'filtrar']);

    Route::get('/busca/resultados', [UsuarioController::class, 'buscar']);
    Route::get('/usuario/perfilAnunciante/{id}', [UsuarioController::class, 'renderPerfilAnunciante']);
});

/* Rotas abertas */

Route::get('/', [ProdutoController::class, 'renderWelcome']);

Route::get('/produtos/detalhar/{id}', [ProdutoController::class, 'renderDetalhar']);

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);

Route::post('/usuario/logar', [UsuarioController::class, 'logar']);

Route::get('/usuario/deslogar', [UsuarioController::class, 'deslogar']);

Route::post('/usuario/perfil/atualizar', [UsuarioController::class, 'atualizar']);