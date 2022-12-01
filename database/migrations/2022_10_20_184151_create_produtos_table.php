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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('disponibilidade', 45);
            $table->float('valor');
            $table->float('taxa_entrega');
            $table->string('descricao', 300);
            $table->foreignId('categoria_id')->constrained();
            $table->foreignId('anunciante_id')->constrained();
            $table->boolean('bloqueado')->default(false);
            
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
        Schema::dropIfExists('produtos');
    }
};
