<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutonomiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autonomia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->enum('levantarse_sin_ayuda', ['SI', 'NO']);
            $table->enum('cama_aseo_dormitorio', ['SI', 'NO']);
            $table->enum('asearse_ducharse', ['SI', 'NO']);
            $table->enum('vestirse', ['SI', 'NO']);
            $table->enum('peinarse', ['SI', 'NO']);
            $table->enum('lavarse_dientes', ['SI', 'NO']);
            $table->enum('utilizar_wc', ['SI', 'NO']);
            $table->enum('desplazamiento_dentro_casa', ['SI', 'NO']);
            $table->enum('comer_solo', ['SI', 'NO']);
            $table->enum('tomarse_medicamentos', ['SI', 'NO']);
            $table->enum('salir_calle', ['SI', 'NO']);
            $table->enum('realizar_compras', ['SI', 'NO']);
            $table->enum('uso_medios_transporte', ['SI', 'NO']);
            $table->enum('medico_controles_salud', ['SI', 'NO']);
            $table->enum('colaborar_tareas_hogar', ['SI', 'NO']);
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
        Schema::dropIfExists('autonomia');
    }
}
