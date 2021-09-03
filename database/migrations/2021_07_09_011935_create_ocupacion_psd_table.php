<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcupacionPsdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacion_psd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('psd_id');
            $table->foreign('psd_id')->references('id')->on('personas_discapacitadas');
            $table->unsignedBigInteger('ocupacion_id');
            $table->foreign('ocupacion_id')->references('id')->on('ocupaciones');
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
        Schema::dropIfExists('ocupacion_psd');
    }
}
