<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLlevaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lleva_cursos', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id_lleva_c');
            $table->unsignedInteger('dni_alumno');
            $table->unsignedTinyInteger('id_curso');
            $table->foreign('dni_alumno')->references('dni_al')->on('alumnos');
            $table->foreign('id_curso')->references('id_curso')->on('cursos');
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
        Schema::dropIfExists('lleva_cursos');
    }
}
