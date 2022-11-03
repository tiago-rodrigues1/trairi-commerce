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
        Schema::create('cliente_avalia_anunciantes', function (Blueprint $table) {
            $table->id();
            $table->integer('estrelas');
            $table->string('comentario', 300);
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('anunciante_id')->constrained();
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
        Schema::dropIfExists('cliente_avalia_anunciantes');
    }
};
