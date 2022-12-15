<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'senha', 'nome', 'nascimento', 'telefone', 'endereco', 'genero'];

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

    public static function salvar($dados)
    {
        $u = new Usuario($dados);
        try
        {
            $u->senha = Hash::make($u->senha);
            $u->save();
        }
        catch(\Exception $e)
        {
            $u = null;
        }
        
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
}
