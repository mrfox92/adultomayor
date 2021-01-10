<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmServicioBasicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_servicio_basico', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('adulto_mayor_id');
            $table->foreign('adulto_mayor_id')->references('id')->on('adultos_mayores');
            $table->unsignedInteger('servicio_basico_id');
            $table->foreign('servicio_basico_id')->references('id')->on('servicios_basicos');
            $table->text('obs_servicio_basico')->nullable();
            $table->timestamp('fecha_servicio_basico')->nullable();
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
        Schema::dropIfExists('am_servicio_basico');
    }
}
