<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Taller;
use Faker\Generator as Faker;

$factory->define(Taller::class, function (Faker $faker) {

    $fecha_inicio = $faker->dateTime('now');
    $fecha_fin    = $faker->dateTime('now', '+1 month');

    return [
        'tipo_taller_id'    =>  \App\TipoTaller::all()->random()->id,
        'nombre'            =>  $faker->sentence,
        'descripcion'       =>  $faker->paragraph,
        'fecha_inicio'      =>  $fecha_inicio,
        'fecha_fin'         =>  $fecha_fin
    ];
});
