<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Usuario extends Model {
    use HasFactory;

    protected $fillable = ['email', 'senha', 'nome', 'nascimento', 'telefone', 'cidade', 'cep', 'bairro', 'endereco', 'genero', 'numero', 'path'];

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

    public static function salvar($dados, $dadosAnunciante = null) {
        $u = new Usuario($dados);

        DB::beginTransaction();

        try {
            $u->senha = Hash::make($u->senha);
            $u->save();

            if ($dadosAnunciante == null) {
                $cliente = new Cliente();
                $u->cliente()->save($cliente);
            } else {
                $anunciante = new Anunciante($dadosAnunciante);
                $u->anunciante()->save($anunciante);

                $tiposDePagamento = TipoDePagamento::orderBy('id')->get();

                foreach ($tiposDePagamento as $tipoDePagamento) {
                    $tipoDePagamento->anunciantes()->attach($u->anunciante->id);
                }
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            $u = null;
        }
        return $u;
    }

    public static function atualizar($dados, $dadosAnunciante = null) {
        $u = Usuario::find(session()->get('usuario')->id);

        DB::beginTransaction();

        try {
            $u->fill($dados);
            $u->save();

            if ($dadosAnunciante != null) {
                $anunciante = $u->anunciante;
                $anunciante->fill($dadosAnunciante);
                $anunciante->save();
            }
            DB::commit();
        } catch(\Exception $e) {
            DB::rollback();
            dd($e);
            return null;
        }
        return $u;
    }

    public static function autenticar($dados) {
        $email = $dados['email'];
        $senha = $dados['senha'];

        try {
            $u = Usuario::where('email', $email)->first();

            if ($u == null) {
                throw new Exception('Email não encontrado');
            }

            $isSenhasIguais = Hash::check($senha, $u->senha);

            if (!$isSenhasIguais) {
                throw new Exception('Senha incorreta!');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return $e;
        }

        return $u;
    }

    public function getAcesso() {
        if ($this->admin) {
            return 'admin';
        } elseif (isset($this->anunciante)) {
            return 'anunciante';
        }
        
        return 'cliente';
    }

    public function fazerBusca($termo, $filtrosUsuario) {
        $resultados = [];

        try {
            $resultados = Produto::join('anunciantes', 'anunciantes.id', '=', 'produtos.anunciante_id')
            ->join('aceitas', 'aceitas.anunciante_id', '=', 'anunciantes.id')
            ->join('tipo_de_pagamentos', 'tipo_de_pagamentos.id', '=', 'aceitas.tipo_de_pagamento_id')
            ->join('pedidos', 'pedidos.anunciante_id', '=', 'anunciantes.id')
            ->select('produtos.*')->where('produtos.nome', 'like', '%'.$termo.'%')
            ->where(function($query) use($filtrosUsuario) {
                foreach ($filtrosUsuario as $key => $filtrosGrupos) {
                    if (!is_null($filtrosGrupos)) {
                        foreach ($filtrosGrupos as $value) {
                            [$tabela, $campo] = explode('-', $key);
                            $query->orwhere($tabela.'.'.$campo, $value);
                        }
                    }
                }
            });

            $resultados = $resultados->distinct()->get();
        } catch (Exception $e) {
            $resultados = null;
        } finally {
            $busca = new Busca(['termo' => $termo]);
            $this->buscas()->save($busca);

            return $resultados;
        }
    }

    public function denunciarProduto($p, $descricao) {

    }

    public function denunciarUsuario($u, $descricao) {

    }

    public function abrirChamado($descricao) {

    }
}
