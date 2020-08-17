<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->unsignedBigInteger('ruc')->unique()->nullable($value = false);
            $table->unsignedBigInteger('num_cuenta')->unique()->nullable($value = false);
            $table->string('name')->unique()->nullable($vale = false);
            $table->text('direccion');
            $table->primary(['ruc', 'num_cuenta']);
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
        Schema::dropIfExists('bancos');
    }
}
