<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdultosMayoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adultos_mayores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut');
            $table->string('nombres');
            $table->string('apellidos');
            $table->timestamp('fecha_nacimiento')->nullable();
            $table->integer('edad');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->unsignedInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');
            $table->unsignedInteger('alfabetizacion_id');
            $table->foreign('alfabetizacion_id')->references('id')->on('alfabetizacion');
            $table->integer('porcentaje_rsh')->nullable();
            $table->enum('estado_club_am', ['No participa', 'Quiere participar']);
            $table->unsignedBigInteger('tipo_vivienda_id'); //revisar bigIncrements y poner increments
            $table->foreign('tipo_vivienda_id')->references('id')->on('tipo_vivienda');
            $table->unsignedInteger('nucleo_familiar_id');
            $table->foreign('nucleo_familiar_id')->references('id')->on('nucleo_familiar');
            $table->enum('recibe_medicamentos', ['SI', 'NO']);
            $table->text('obs_medicamentos')->nullable();
            $table->enum('emprendimiento', ['SI', 'NO']);
            $table->text('obs_emprendimiento')->nullable();
            $table->enum('atencion_panales', ['SI', 'NO']);
            $table->text('obs_atencion_panales')->nullable();
            $table->enum('postrado', ['SI', 'NO']);
            $table->text('obs_postrado')->nullable();
            $table->enum('habitabilidad_casa', ['SI', 'NO']);
            $table->text('obs_hab_casa')->nullable();
            $table->enum('postulacion_fosis', ['SI', 'NO']);
            $table->text('obs_fosis')->nullable();
            $table->timestamp('fecha_postulacion_fosis')->nullable();// agregar mas adelante estado postulacion fosis
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('adultos_mayores');
    }
}
