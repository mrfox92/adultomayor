<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ServicioBasico;
use Faker\Generator as Faker;

$factory->define(ServicioBasico::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
