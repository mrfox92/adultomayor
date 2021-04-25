<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DiscapacidadAm;
use Faker\Generator as Faker;

$factory->define(DiscapacidadAm::class, function (Faker $faker) {
    return [
        'am_id'                 =>  \App\AdultoMayor::all()->random()->id,
        'id_tipo_discapacidad'  =>  \App\TipoDiscapacidad::all()->random()->id,
        'nombre'                =>  $faker->sentence,
        'observacion'           =>  $faker->sentence,
        'user_id'               =>  \App\User::all()->random()->id
    ];
});
