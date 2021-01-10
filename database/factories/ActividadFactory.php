<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actividad;
use Faker\Generator as Faker;

$factory->define(Actividad::class, function (Faker $faker) {

    $fecha_inicio = $faker->dateTime('now');
    $fecha_fin    = $faker->dateTime('now', '+1 month');

    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph,
        'fecha_inicio'  =>  $fecha_inicio,
        'fecha_fin'     =>  $fecha_fin
    ];
});
