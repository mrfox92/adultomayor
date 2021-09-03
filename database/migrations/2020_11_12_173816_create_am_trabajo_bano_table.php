<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmTrabajoBanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_trabajo_bano', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->unsignedInteger('trabajo_bano_id');
            $table->foreign('trabajo_bano_id')->references('id')->on('trabajo_bano');
            $table->text('obs_trabajo_bano')->nullable();
            $table->timestamp('fecha_trabajo_bano')->nullable();
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
        Schema::dropIfExists('am_trabajo_bano');
    }
}
