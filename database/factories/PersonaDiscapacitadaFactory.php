<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PersonaDiscapacitada;
use Faker\Generator as Faker;


$factory->define(PersonaDiscapacitada::class, function (Faker $faker) {

    $fecha_nacimiento = $faker->dateTimeBetween($startDate = '-45 years', $endDate = '-18 years', $timezone = 'America/New_York');
    $sexo = $faker->randomElement(['F', 'M']);
    $sociedad_civil = $faker->randomElement(['SI', 'NO']);
    $recibe_pension = $faker->randomElement(['SI', 'NO']);

    return [
        'rut'                   =>  $faker->uuid,
        'num_documento'         =>  $faker->uuid,
        'nombres'               =>  $faker->name,
        'apellidos'             =>  $faker->lastName,
        'fecha_nacimiento'      =>  $fecha_nacimiento,
        'direccion'             =>  $faker->streetAddress,
        'telefono'              =>  $faker->tollFreePhoneNumber,
        'nacionalidad_id'       =>  \App\Nacionalidad::all()->random()->id,
        'sexo'                  =>  $sexo,
        'sociedad_civil'        =>  $sociedad_civil,
        'obs_sociedad_civil'    =>  $faker->paragraph,
        'recibe_pension'        =>  $recibe_pension,
        'user_id'               =>  \App\User::all()->random()->id,
    ];
});
