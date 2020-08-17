<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            
            $table->unsignedInteger('dni_do')->primary()->unique();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('date');
            $table->boolean('status');
            $table->unsignedInteger('phone')->nullable();
            $table->char('sexo',1);
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
        Schema::dropIfExists('docentes');
    }
}
