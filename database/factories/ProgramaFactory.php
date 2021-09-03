<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Programa;
use Faker\Generator as Faker;

$factory->define(Programa::class, function (Faker $faker) {

    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph,
        'objetivo'      =>  $faker->sentence,
        'requisitos'    =>  $faker->sentence,
    ];
});
