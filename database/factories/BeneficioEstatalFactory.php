<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BeneficioEstatal;
use Faker\Generator as Faker;

$factory->define(BeneficioEstatal::class, function (Faker $faker) {
    
    return [
        'nombre'        =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph
    ];
});
