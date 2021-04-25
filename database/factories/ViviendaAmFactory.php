<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ViviendaAm;
use Faker\Generator as Faker;

$factory->define(ViviendaAm::class, function (Faker $faker) {

    $ocupacion_vivienda = $faker->randomElement(['PAGADA', 'PAGANDOSE', 'ARRENDADA', 'CEDIDA', 'USUFRUCTO', 'IRREGULAR']);
    $ocupacion_sitio = $faker->randomElement(['PAGADO', 'PAGANDOSE', 'ARRENDADO', 'CEDIDO', 'USUFRUCTO', 'OCUPACION', 'POSEEDOR']);
    $comparte_terreno = $faker->randomElement(['VIVIENDA', 'TERRENO', 'AMBAS', 'NO']);

    return [
        'am_id'                 =>  \App\AdultoMayor::all()->random()->id,
        'id_tipo_vivienda'      =>  \App\TipoVivienda::all()->random()->id,
        'ocupacion_vivienda'    =>  $ocupacion_vivienda,
        'ocupacion_sitio'       =>  $ocupacion_sitio,
        'comparte_terreno'      =>  $comparte_terreno,
        'user_id'               =>  \App\User::all()->random()->id
    ];

});
