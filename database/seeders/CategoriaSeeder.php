<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run() {
        DB::table('categorias')->insert([
            ['nome' => 'Alimentos e Bebidas', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Agropecuária', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Artigos de Festa', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Automotivos', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Bolsas, Malas e Mochilas', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Brinquedos', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Cabelos', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Cama, Mesa e Banho', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Celulares e Smartphones', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Cosméticos', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Contabilidade', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Decoração', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Eletrodomésticos', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Esportes', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Imóveis', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Informática', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Manufatura e Artesanato', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Moda', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Papelaria', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Pet Shop', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Saúde e Farmácia', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Serviços e Materiais de Construção', 'created_at' => date('Y-m-d H:i:s')],
            ['nome' => 'Transportes', 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
