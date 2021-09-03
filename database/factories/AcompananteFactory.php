<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Acompanante;
use Faker\Generator as Faker;

$factory->define(Acompanante::class, function (Faker $faker) {

    $sexo_acompanante = $faker->randomElement(['F', 'M']);
    $parentesco_am = $faker->randomElement(['JEFE','CONYUGE', 'HIJOAMBOS', 'HIJOJEFE', 'HIJOCONYUGE',
            'PADRE/MADRE', 'SUEGRO', 'YERNO/NUERA', 'NIETO/A', 'BISNIETO/A', 'HERMANO/A', 'CUNADO/A',
            'FAMILIAR', 'NOFAMILIAR']);
    $estado_trabajo = $faker->randomElement(['FUERA', 'DENTRO', 'NO']);
        
    return [
        'am_id'                         =>  \App\AdultoMayor::all()->random()->id,
        'sexo_acompanante'              =>  $sexo_acompanante,
        'edad'                          =>  $faker->numberBetween(65, 99),
        'parentesco_am'                 =>  $parentesco_am,
        'estado_trabajo'                =>  $estado_trabajo,
        'user_id'                       =>  \App\User::all()->random()->id,
    ];

});
