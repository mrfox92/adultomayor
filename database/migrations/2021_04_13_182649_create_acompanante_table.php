<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompananteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acompanante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('am_id');
            $table->foreign('am_id')->references('id')->on('adultos_mayores');
            $table->enum('sexo_acompanante', ['F', 'M']);
            $table->integer('edad');
            $table->enum('parentesco_am', ['JEFE','CONYUGE', 'HIJOAMBOS', 'HIJOJEFE', 'HIJOCONYUGE',
            'PADRE/MADRE', 'SUEGRO', 'YERNO/NUERA', 'NIETO/A', 'BISNIETO/A', 'HERMANO/A', 'CUNADO/A',
            'FAMILIAR', 'NOFAMILIAR']);
            $table->enum('estado_trabajo', ['FUERA', 'DENTRO', 'NO']);
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
        Schema::dropIfExists('acompanante');
    }
}
