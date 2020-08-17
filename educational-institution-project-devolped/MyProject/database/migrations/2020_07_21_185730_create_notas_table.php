<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            //$table->smallInteger('id_reg_cur')->autoIncrement();
            $table->tinyIncrements('id_registro');
            $table->unsignedInteger('dni_reg_alu');
            $table->unsignedInteger('dni_reg_doc');
            $table->unsignedTinyInteger('id_reg_curso');
            $table->dateTime('fecha_registro');
            $table->unsignedTinyInteger('nota');
            $table->timestamps();
            $table->softDeletes();
            
        });
        Schema::table('notas', function($table) {
            $table->foreign('dni_reg_alu')->references('dni_al')->on('alumnos');
            $table->foreign('dni_reg_doc')->references('dni_do')->on('docentes');
            $table->foreign('id_reg_curso')->references('id_curso')->on('cursos');
            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
