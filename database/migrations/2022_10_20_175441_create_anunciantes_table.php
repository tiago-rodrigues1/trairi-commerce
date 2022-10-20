<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anunciantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia', 200);
            $table->string('descricao', 300);
            $table->string('telefone_comercial', 11);
            $table->string('end_comercial', 200);
            $table->string('funcionamento', 100);
            $table->string('cpf_cnpj', 14);
            $table->foreignId('usuario_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anunciantes');
    }
};
