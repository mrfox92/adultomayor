<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discapacidad;
use Faker\Generator as Faker;

$factory->define(Discapacidad::class, function (Faker $faker) {
    return [
        'nombre'          =>  $faker->sentence,
        'descripcion'   =>  $faker->paragraph,
        'tipo_discapacidad_id'  =>  \App\TipoDiscapacidad::all()->random()->id,  
    ];
});
