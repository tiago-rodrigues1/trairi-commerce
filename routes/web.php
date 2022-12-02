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

Route::get('/notificacoes', function () {
    return view('notificacoes');
});

Route::post('/usuario/cadastrar', [UsuarioController::class, 'cadastrar']);