<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alfabetizacion;
use Faker\Generator as Faker;

$factory->define(Alfabetizacion::class, function (Faker $faker) {
    return [
        'nombre'    =>  $faker->sentence
    ];
});
