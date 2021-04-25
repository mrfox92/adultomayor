<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Salud;
use Faker\Generator as Faker;

$factory->define(Salud::class, function (Faker $faker) {

    $estado_salud = $faker->randomElement(['EXCELENTE', 'BUENO', 'REGULAR', 'MALO', 'PESIMO']);
    $inscrito_centro_salud = $faker->randomElement(['SI', 'OTRO', 'NO']);
    $controles_salud = $faker->randomElement(['SI', 'NO']);
    $dependencia_severa = $faker->randomElement(['SI', 'NO', 'NOSABE']);
    
    return [
        'am_id'                 =>  \App\AdultoMayor::all()->random()->id,
        'estado_salud'          =>  $estado_salud,
        'inscrito_centro_salud' =>  $inscrito_centro_salud,
        'controles_salud'       =>  $controles_salud,
        'dependencia_severa'    =>  $dependencia_severa,
        'user_id'               =>  \App\User::all()->random()->id
    ];
});
