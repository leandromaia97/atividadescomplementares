<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('nome_certificado', 255);
            $table->string('tipo', 255);
            $table->date('inicio');
            $table->date('termino');
            $table->integer('carga_horaria');
            $table->integer('total_horas_complementares')->nullable();
            $table->integer('minimo_horas_complementares')->nullable();
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
        Schema::dropIfExists('certificados');
    }
}