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
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 300);
            $table->dateTime('data_hora');
            $table->foreignId('usuario_id')->constrained();
            $table->foreignId('produto_id')->constrained()->nullable();
            $table->unsignedBigInteger('usuario_denunciado_id')->nullable();
            $table->foreign('usuario_denunciado_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('denuncias');
    }
};
