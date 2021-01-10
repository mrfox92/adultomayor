<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NucleoFamiliar;
use Faker\Generator as Faker;

$factory->define(NucleoFamiliar::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
