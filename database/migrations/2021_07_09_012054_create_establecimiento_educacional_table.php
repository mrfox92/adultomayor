<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablecimientoEducacionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establecimiento_educacional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('psd_id');
            $table->foreign('psd_id')->references('id')->on('personas_discapacitadas');
            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('encargado');
            $table->string('curso_actual');
            $table->string('profesor')->nullable();
            $table->enum('programa_pie', ['SI', 'NO']);
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
        Schema::dropIfExists('establecimiento_educacional');
    }
}
