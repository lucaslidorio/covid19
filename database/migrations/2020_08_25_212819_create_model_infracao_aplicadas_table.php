<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelInfracaoAplicadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infracaoAplicada', function (Blueprint $table) {
            $table->increments('id');
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidade');
            $table->Date('data');
            $table->time('hora');
            $table->string('obs');
            $table->integer('idUf')->unsigned();
            $table->foreign('idUf')->references('id')->on('uf');
            $table->integer('idPessoa')->unsigned();
            $table->foreign('idPessoa')->references('id')->on('pessoa');
            $table->integer('idMotivo')->unsigned();
            $table->foreign('idMotivo')->references('id')->on('motivo');
            $table->integer('idInfracao')->unsigned();
            $table->foreign('idInfracao')->references('id')->on('infracao');         
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
        Schema::dropIfExists('infracaoAplicada');
    }
}
