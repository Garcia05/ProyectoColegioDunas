<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('id_boleta');
            $table->unsignedBigInteger('id_col');
            $table->unsignedBigInteger('id_banco');
            $table->unsignedMediumInteger('id_pag');
            $table->dateTime('fecha_b');
            $table->foreign('id_banco')->references('num_cuenta')->on('bancos');
            $table->foreign('id_col')->references('ruc')->on('colegios');
            $table->foreign('id_pag')->references('id_pago')->on('pagos');
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
        Schema::dropIfExists('boletas');
    }
}
