<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HabitabilidadVivienda;
use Faker\Generator as Faker;

$factory->define(HabitabilidadVivienda::class, function (Faker $faker) {

    $fuente_calefaccion = $faker->randomElement(['GAS', 'PARAFINA', 'ELECTRICIDAD', 'LENA', 'CARBON', 'SOLAR', 'OTRA']);
    $estado_piso = $faker->randomElement(['BUENO', 'ACEPTABLE', 'MALO']);
    $estado_muros = $faker->randomElement(['BUENO', 'ACEPTABLE', 'MALO']);
    $estado_techos = $faker->randomElement(['BUENO', 'ACEPTABLE', 'MALO']);
    $camas_cada_integrante = $faker->randomElement(['SI', 'NO']);
    $seguridad_vivienda = $faker->randomElement(['SI', 'MEDIANAMENTE', 'NO']);

    return [
        'am_id'                 =>  \App\AdultoMayor::all()->random()->id,
        'fuente_calefaccion'    =>  $fuente_calefaccion,
        'estado_piso'           =>  $estado_piso,
        'estado_muros'          =>  $estado_muros,
        'estado_techos'         =>  $estado_techos,
        'num_dormitorios'       =>  $faker->numberBetween(1,4),
        'camas_cada_integrante' =>  $camas_cada_integrante,
        'seguridad_vivienda'    =>  $seguridad_vivienda,
        'user_id'               =>  \App\User::all()->random()->id
    ];
});
