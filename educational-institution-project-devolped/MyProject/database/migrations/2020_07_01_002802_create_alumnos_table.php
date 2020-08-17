<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            
            $table->unsignedInteger('dni_al')->primary()->unique();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->char('sexo', 1);
            $table->date('date');
            $table->string('email')->nullable();
            $table->integer('dni_father');
            $table->integer('grado_alumno');
            $table->string('seccion_alumno');
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
        Schema::dropIfExists('alumnos');
    }
}
