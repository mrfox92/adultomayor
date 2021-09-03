<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficioEstatalPsdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficio_estatal_psd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('psd_id');
            $table->foreign('psd_id')->references('id')->on('personas_discapacitadas');
            $table->unsignedBigInteger('beneficio_estatal_id');
            $table->foreign('beneficio_estatal_id')->references('id')->on('beneficios_estatales');
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
        Schema::dropIfExists('beneficio_estatal_psd');
    }
}
