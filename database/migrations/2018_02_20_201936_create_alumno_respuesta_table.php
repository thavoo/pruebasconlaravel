<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_respuesta', function (Blueprint $table) {
            $table->integer('alumno_id')->unsigned();
            $table->integer('unidad_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->string('pregunta_id');
            $table->string('respondidas_id');
            $table->string('correcta_id');
            $table->integer('points');

            $table->foreign('alumno_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipoeval')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_respuesta');
    }
}
