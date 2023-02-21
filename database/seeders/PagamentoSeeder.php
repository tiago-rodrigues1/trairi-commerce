<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagamentoSeeder extends Seeder {

    public function run() {
        DB::table('tipo_de_pagamentos')->insert([
            [
                'descricao' => 'Dinheiro',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'Pix',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'Cartão de crédito',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'descricao' => 'Cartão de débito',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
