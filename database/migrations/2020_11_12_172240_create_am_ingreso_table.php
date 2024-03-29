<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_ingreso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->unsignedInteger('ingreso_id');
            $table->foreign('ingreso_id')->references('id')->on('ingresos');
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
        Schema::dropIfExists('am_ingreso');
    }
}
