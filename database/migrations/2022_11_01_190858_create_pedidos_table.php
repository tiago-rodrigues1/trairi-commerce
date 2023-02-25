<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 45);
            $table->dateTime('data_hora');
            $table->string('cep_destino', 100);
            $table->string('cidade_destino', 100);
            $table->string('bairro_destino', 100);
            $table->string('endereco_destino', 100);
            $table->string('observacao', 500);
            $table->foreignId('tipo_de_pagamento_id')->constrained();
            $table->foreignId('cliente_id')->constrained();
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
        Schema::dropIfExists('pedidos');
    }
};
