<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoTaller;
use Faker\Generator as Faker;

$factory->define(TipoTaller::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
