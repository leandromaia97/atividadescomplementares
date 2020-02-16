<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->bigIncrements('id_avaliacao');
            $table->integer('user_id');
            $table->integer('certificado_id');
            $table->string('avaliacao');
            $table->longText('justificativa');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('certificado_id')->references('id_certificado')->on('certificados');
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
        Schema::dropIfExists('avaliacoes');
    }
}
