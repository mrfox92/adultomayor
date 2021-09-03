<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmAtencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_atencion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->unsignedInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atenciones');
            $table->text('obs_atencion')->nullable();
            $table->timestamp('fecha_atencion')->nullable();
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
        Schema::dropIfExists('am_atencion');
    }
}
