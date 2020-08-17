<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->mediumIncrements('id_pago');
            $table->unsignedInteger('dni_alumno')->unique();
            $table->unsignedBigInteger('num_cuenta_b')->unique()->nullable($value = false);
            $table->decimal('monto', 15, 2);
            $table->dateTime('fecha_pago');
            $table->foreign('dni_alumno')->references('dni_al')->on('alumnos');
            $table->foreign('num_cuenta_b')->references('num_cuenta')->on('bancos');
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
        Schema::dropIfExists('pagos');
    }
}
