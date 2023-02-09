<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run() {
        DB::table('categorias')->insert([
            'nome' => 'Alimentos'
        ]);
    }
}
