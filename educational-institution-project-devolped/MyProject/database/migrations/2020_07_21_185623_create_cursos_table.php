<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
           
            $table->tinyIncrements('id_curso');
            $table->string('nombre_curso');
            $table->unsignedTinyInteger('anio')->nullable();
            $table->string('grado');
            $table->boolean('status');
            $table->unsignedInteger('fo_dni_do')->nullable();;
            $table->foreign('fo_dni_do')->references('dni_do')->on('docentes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
