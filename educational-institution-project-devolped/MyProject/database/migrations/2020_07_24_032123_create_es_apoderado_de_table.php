<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsApoderadoDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('es_apoderado_de', function (Blueprint $table) {
            $table->increments('id_es_apod_de');
            $table->unsignedInteger('dni_alumno');
            $table->unsignedInteger('dni_apoderado');
            $table->foreign('dni_alumno')->references('dni_al')->on('alumnos');
            $table->foreign('dni_apoderado')->references('dni_apo')->on('apoderados');
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
        Schema::dropIfExists('es_apoderado_de');
    }
}
