<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutoImagem;

class ProdutoImagemController extends Controller
{
    public function excluirProdutoImagem($id) {
        $produtoImagem = ProdutoImagem::findOrFail($id);
        $produtoImagem->delete();
    }
}
