<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasDiscapacitadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_discapacitadas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut');
            $table->string('num_documento');
            $table->string('nombres');
            $table->string('apellidos');
            $table->dateTime('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->unsignedInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');
            $table->enum('sexo', ['F', 'M']);
            $table->enum('sociedad_civil', ['SI', 'NO']);
            $table->string('obs_sociedad_civil')->nullable();
            $table->enum('recibe_pension', ['SI', 'NO']);
            $table->string('picture')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas_discapacitadas');
    }
}
