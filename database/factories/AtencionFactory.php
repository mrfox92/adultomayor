<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Atencion;
use Faker\Generator as Faker;

$factory->define(Atencion::class, function (Faker $faker) {

    $fecha_inicio = $faker->dateTime('now');
    $fecha_fin    = $faker->dateTime('now', '+1 month');

    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph,
        'fecha_inicio'  =>  $fecha_inicio,
        'fecha_fin'     =>  $fecha_fin
    ];
});
