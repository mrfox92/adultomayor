<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmAyudaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('am_ayuda_tecnica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('adulto_mayor_id');
            $table->foreign('adulto_mayor_id')->references('id')->on('adultos_mayores');
            $table->unsignedInteger('ayuda_tecnica_id');
            $table->foreign('ayuda_tecnica_id')->references('id')->on('ayudas_tecnicas');
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('am_ayuda_tecnica');
    }
}
