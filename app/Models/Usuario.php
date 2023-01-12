<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'senha', 'nome', 'nascimento', 'telefone', 'cidade', 'cep', 'bairro', 'endereco', 'genero'];

    protected $hidden = ['senha'];

    public function buscas() {
        return $this->hasMany(Busca::class);
    }

    public function anunciante() {
        return $this->hasOne(Anunciante::class);
    }

    public function denuncias() {
        return $this->hasMany(Denuncia::class);
    }

    public function cliente() {
        return $this->hasOne(Cliente::class);
    }

    public static function salvar($dados, $dadosAnunciante = null)
    {
        $u = new Usuario($dados);

        try
        {
            $u->senha = Hash::make($u->senha);
            $u->save();

            if ($dadosAnunciante == null) {
                $cliente = new Cliente();
                $u->cliente()->save($cliente);
            } else {
                $anunciante = new Anunciante($dadosAnunciante);
                $u->anunciante()->save($anunciante);
            }
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
            $u = null;
        }

        dd($u);
        
        return $u;
    }

    public static function autenticar($dados) {
        $email = $dados['email'];
        $senha = $dados['senha'];

        try {
            $u = DB::table('usuarios')->where('email', $email)->first();

            $isSenhasIguais = Hash::check($senha, $u->senha);

            if (!$isSenhasIguais) {
                $u = null;
            }
        } catch (\Exception $e) {
            $u = null;
        }

        return $u;
    }

    public function getAcesso()
    {
        if ($this->admin)
        {
            return 'admin';
        }
        elseif ($this->anunciante != null)
        {
            return 'anunciante';
        }
        return 'cliente';
    }

    public static function cadastrar($nome, $senha, $email, $nascimento, $telefone, $endereco, $genero) {

    }

    public function fazerBusca($termo) {

    }

    public function denunciarProduto($p, $descricao) {

    }

    public function denunciarUsuario($u, $descricao) {

    }

    public function abrirChamado($descricao) {

    }
}
