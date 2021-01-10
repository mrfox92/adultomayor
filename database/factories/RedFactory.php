<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Red;
use Faker\Generator as Faker;

$factory->define(Red::class, function (Faker $faker) {
    return [
        'nombre'    =>  $faker->sentence,
        'num_contacto'  =>  $faker->tollFreePhoneNumber
    ];
});
