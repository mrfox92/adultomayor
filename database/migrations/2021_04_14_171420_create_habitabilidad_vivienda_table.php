<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitabilidadViviendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitabilidad_vivienda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->enum('fuente_calefaccion', ['GAS', 'PARAFINA', 'ELECTRICIDAD', 'LENA', 'CARBON', 'SOLAR', 'OTRA']);
            $table->enum('estado_piso', ['BUENO', 'ACEPTABLE', 'MALO']);
            $table->enum('estado_muros', ['BUENO', 'ACEPTABLE', 'MALO']);
            $table->enum('estado_techos', ['BUENO', 'ACEPTABLE', 'MALO']);
            $table->integer('num_dormitorios');
            $table->enum('camas_cada_integrante', ['SI', 'NO']);
            $table->enum('seguridad_vivienda', ['SI', 'MEDIANAMENTE', 'NO']);
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
        Schema::dropIfExists('habitabilidad_vivienda');
    }
}
