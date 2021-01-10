<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TrabajoBano;
use Faker\Generator as Faker;

$factory->define(TrabajoBano::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
