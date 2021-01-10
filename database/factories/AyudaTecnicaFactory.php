<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AyudaTecnica;
use Faker\Generator as Faker;

$factory->define(AyudaTecnica::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
