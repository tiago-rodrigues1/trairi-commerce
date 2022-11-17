<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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