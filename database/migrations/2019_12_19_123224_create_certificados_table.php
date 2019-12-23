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
            $table->integer('id')->autoincrement();
            $table->binary('arquivo');
            $table->string('nome_aluno', 255);
            $table->string('nome_certificado', 255);
            $table->string('tipo', 255);
            $table->date('inicio');
            $table->date('termino');
            $table->integer('carga_horaria');
            $table->string('status', 45);
            $table->integer('total_horas_complementares');
            $table->integer('minimo_horas_complementares');
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
