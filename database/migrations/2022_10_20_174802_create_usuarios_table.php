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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email', 300)->unique();
            $table->string('senha', 256);
            $table->string('nome', 200);
            $table->dateTime('nascimento');
            $table->string('telefone', 11);
            $table->string('endereco', 200);
            $table->enum('genero', ['feminino', 'masculino', 'não declarado']);
            $table->boolean('admin')->default(false);
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
        Schema::dropIfExists('usuarios');
    }
};
