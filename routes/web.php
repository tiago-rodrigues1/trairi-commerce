<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pedidos/listar', function () {
    return view('pedidos/listar');
});

Route::get('/pedidos/comprovar', function () {
    return view('pedidos/comprovar');
});

Route::get('/pedidos/novo', function () {
    return view('pedidos/novo');
});

Route::get('/busca/resultados', function () {
    return view('busca/resultados');
});

Route::get('/produtos/adicionar', function () {
    return view('produtos/adicionar');
});

<<<<<<< HEAD
Route::get('/notificacoes', function () {
    return view('notificacoes');
});

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);
=======
Route::get('/usuarios/notificacoes', function () {
    return view('usuarios/notificacoes');
});

Route::get('/templates/filtro', function () {
    return view('templates/filtro');
});
>>>>>>> 6d5b15149b71dd3fb9bb2e1991aa99fd29bb5bdf
