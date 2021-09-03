<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscapacidadPsdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discapacidad_psd', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('psd_id');
            $table->foreign('psd_id')->references('id')->on('personas_discapacitadas');
            $table->unsignedInteger('tipo_discapacidad_id');
            $table->foreign('tipo_discapacidad_id')->references('id')->on('tipo_discapacidad');
            $table->string('nombre');
            $table->text('observacion')->nullable();
            $table->integer('porcentaje_discapacidad')->nullable();
            $table->string('picture')->nullable();
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
        Schema::dropIfExists('discapacidad_psd');
    }
}
