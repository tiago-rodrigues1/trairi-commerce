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
            $table->foreignId('tipo_de_pagamento_id')->constrained();
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('anunciante_id')->constrained();
            $table->enum('estado', ['Pendente', 'Aceito', 'Recusado', 'Em andamento', 'Cancelado', 'Finalizado', 'Comprovado'])->default('Pendente');
            $table->string('cep_destino', 9);
            $table->string('cidade_destino', 100);
            $table->string('bairro_destino', 100);
            $table->string('endereco_destino', 300);
            $table->integer('numero_destino');
            $table->string('observacao', 500)->nullable();
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
