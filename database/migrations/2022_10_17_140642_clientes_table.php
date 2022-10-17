<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', '100');
            $table->string('cpf', '11')->unique();
            $table->date('data_nascimento')->nullable();
            $table->integer('sexo_id')->nullable();
            $table->string('endereco', '100')->nullable();
            $table->integer('estado_id')->nullable();
            $table->integer('cidade_id')->nullable();

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
        Schema::dropIfExists('clientes');
    }
}
