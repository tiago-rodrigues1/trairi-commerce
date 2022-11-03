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
        Schema::create('possuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anunciante_id')->constrained();
            $table->foreignId('canal_de_atendimento_id')->constrained();
            $table->string('user', 100);
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
        Schema::dropIfExists('possuis');
    }
};
