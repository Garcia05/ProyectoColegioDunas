<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id_envio');
            $table->unsignedInteger('dni_apod');
            $table->unsignedInteger('id_bol');
            $table->foreign('dni_apod')->references('dni_apo')->on('apoderados');
            $table->foreign('id_bol')->references('id_boleta')->on('boletas');
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
        Schema::dropIfExists('envios');
    }
}
