<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nome');
            $table->string('nomeFantasia');
            $table->integer('tipoDocumento');
            $table->string('documento');
            $table->string('inscricaoEstadual');
            $table->Date('dataNascimento');
            $table->string('telefone');
            $table->string('email');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->integer('idUf')->unsigned();
            $table->foreign('idUf')->references('id')->on('uf');
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
        Schema::dropIfExists('pessoa');
    }
}
