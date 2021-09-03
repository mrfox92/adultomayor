<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_taller', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taller_id');
            $table->foreign('taller_id')->references('id')->on('talleres');
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
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
        Schema::dropIfExists('am_taller');
    }
}
