<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder {
    public function run() {
        DB::table('usuarios')->insert([
            'nome' => 'Joao da Silva',
            'email' => Str::random(10).'@gmail.com',
            'senha' => Hash::make('password'),
            'nascimento' => '2004-06-28 00:00:00',
            'telefone' => '88888888888',
            'cep' => '59151250',
            'cidade' => 'Parnamirim',
            'bairro' => 'Nova Parnamirim',
            'endereco' => 'Avenida Abel Cabral, 43',
            'genero' => 'masculino'
        ]);

        DB::table('anunciantes')->insert([
            'nome_fantasia' => 'Pizzaria Trairi',
            'descricao' => 'Pizza boa de verdade',
            'cep' => '59010010',
            'cidade' => 'Natal',
            'bairro' => 'Praia do Meio',
            'endereco' => 'Rua Capitão-mor Gouveia',
            'telefone' => '44444444444',
            'funcionamento' => '08:00 até 18:00',
            'cpf_cnpj' => '111111111111',
            'usuario_id' => '1'
        ]);
    }
}
