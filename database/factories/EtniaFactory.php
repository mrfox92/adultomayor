<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etnia;
use Faker\Generator as Faker;

$factory->define(Etnia::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
