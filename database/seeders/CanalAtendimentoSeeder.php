<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanalAtendimentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('canal_de_atendimentos')->insert([
            ['plataforma' => 'Instagram',
            'link' => 'https://www.instagram.com/',
            'icone' => '/icons/canais_anunciante/instagram-svgrepo-com.svg'],
            ['plataforma' => 'Email',
            'link' => 'mailto:',
            'icone' => '/icons/canais_anunciante/email-svgrepo-com.svg'],
            ['plataforma' => 'Facebook',
            'link' => 'https://www.facebook.com/',
            'icone' => '/icons/canais_anunciante/facebook-boxed-svgrepo-com.svg'],
            ['plataforma' => 'Whatsapp',
            'link' => 'https://wa.me/',
            'icone' => '/icons/canais_anunciante/whatsapp-svgrepo-com.svg']
        ]);
    }
}
