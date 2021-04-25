<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendaAmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vivienda_am', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->unsignedBigInteger('id_tipo_vivienda');
            $table->foreign('id_tipo_vivienda')->references('id')->on('tipo_vivienda');
            $table->enum('ocupacion_vivienda', ['PAGADA', 'PAGANDOSE', 'ARRENDADA', 'CEDIDA', 'USUFRUCTO', 'IRREGULAR']);
            $table->enum('ocupacion_sitio', ['PAGADO', 'PAGANDOSE', 'ARRENDADO', 'CEDIDO', 'USUFRUCTO', 'OCUPACION', 'POSEEDOR']);
            $table->enum('comparte_terreno', ['VIVIENDA', 'TERRENO', 'AMBAS', 'NO']);
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
        Schema::dropIfExists('vivienda_am');
    }
}
