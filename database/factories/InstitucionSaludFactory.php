<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InstitucionSalud;
use Faker\Generator as Faker;

$factory->define(InstitucionSalud::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker->sentence,
        'direccion'     =>  $faker->streetAddress,
        'localidad'     =>  $faker->city
    ];
});
