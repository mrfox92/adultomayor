<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmEtniaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_etnia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('adulto_mayor_id');
            $table->foreign('adulto_mayor_id')->references('id')->on('adultos_mayores');
            $table->unsignedBigInteger('etnia_id');
            $table->foreign('etnia_id')->references('id')->on('etnias');
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
        Schema::dropIfExists('am_etnia');
    }
}
