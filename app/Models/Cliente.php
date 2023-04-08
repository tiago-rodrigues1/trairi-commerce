<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }

    public function anunciantes() {
        return $this->belongsToMany(Anunciante::class, 'cliente_avalia_anunciantes')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosAvaliados() {
        return $this->belongsToMany(Produto::class, 'cliente_avalia_produtos')->withPivot('estrelas', 'comentario')->withTimestamps();
    }

    public function produtosFavoritados() {
        return $this->belongsToMany(Produto::class, 'favoritas')->withTimestamps();
    }

    public function enviarPedido($p) {

    }

    public function comprovarFinalizacao($p, $estrelas) {

    }

    public function favoritarProduto($p) {
        try {
            $this->produtosFavoritados()->attach($p);
            session()->put('usuario', $this->usuario);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function desfavoritarProduto($p) {
        try {
            $this->produtosFavoritados()->detach($p);
            session()->put('usuario', $this->usuario);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function avaliarAnunciante($p, $estrelas, $comentario) {

    }

    public function avaliarProduto($p, $estrelas, $comentario) {

    }

    public function editarAvaliacao ($a, $estrelas, $comentario) {
        
    }
}
