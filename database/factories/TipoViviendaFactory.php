<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoVivienda;
use Faker\Generator as Faker;

$factory->define(TipoVivienda::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
