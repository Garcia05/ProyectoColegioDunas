<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicta_cursos', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id_ec');
            $table->unsignedInteger('dni_doec')->unique();
            $table->unsignedTinyInteger('id_cursec')->unique();
            $table->foreign('dni_doec')->references('dni_do')->on('docentes');
            $table->foreign('id_cursec')->references('id_curso')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dicta_cursos');
    }
}
