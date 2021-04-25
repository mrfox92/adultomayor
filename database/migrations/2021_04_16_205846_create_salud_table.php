<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salud', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->enum('estado_salud', ['EXCELENTE', 'BUENO', 'REGULAR', 'MALO', 'PESIMO']);
            $table->enum('inscrito_centro_salud', ['SI', 'OTRO', 'NO']);
            $table->enum('controles_salud', ['SI', 'NO']);
            $table->enum('dependencia_severa', ['SI', 'NO', 'NOSABE']);
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
        Schema::dropIfExists('salud');
    }
}
