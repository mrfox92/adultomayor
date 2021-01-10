<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdultoMayor;
use Faker\Generator as Faker;

$factory->define(AdultoMayor::class, function (Faker $faker) {

    $fecha_nacimiento = $faker->dateTimeBetween($startDate = '-50 years', $endDate = 'now', $timezone = 'America/New_York');
    $estado_club_am = $faker->randomElement(['No participa', 'Quiere participar']);
    $recibe_medicamento = $faker->randomElement(['SI', 'NO']);
    $emprendimiento = $faker->randomElement(['SI', 'NO']);
    $atencion_panales = $faker->randomElement(['SI', 'NO']);
    $postrado = $faker->randomElement(['SI', 'NO']);
    $habitabilidad_casa = $faker->randomElement(['SI', 'NO']);
    $postulacion_fosis = $faker->randomElement(['SI', 'NO']);
    $fecha_postulacion_fosis = $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = 'America/New_York');


    return [
        'rut'   =>  $faker->uuid,   //  identificador unico
        'nombres'   =>  $faker->name,
        'apellidos' =>  $faker->lastName,
        'fecha_nacimiento'  =>  $fecha_nacimiento,
        'edad'              =>  $faker->unique()->numberBetween(65, 99),
        'direccion'         =>  $faker->streetAddress,
        'telefono'          =>  $faker->tollFreePhoneNumber,
        'nacionalidad_id'   =>  \App\Nacionalidad::all()->random()->id,
        'alfabetizacion_id' =>  \App\Alfabetizacion::all()->random()->id,
        'porcentaje_rsh'    =>  $faker->unique()->numberBetween(20, 70),
        'estado_club_am'    =>  $estado_club_am,
        'tipo_vivienda_id'  =>  \App\TipoVivienda::all()->random()->id,
        'nucleo_familiar_id'    =>  \App\NucleoFamiliar::all()->random()->id,
        'recibe_medicamentos'   =>  $recibe_medicamento,
        'obs_medicamentos'  =>  $faker->paragraph,
        'emprendimiento'    =>  $emprendimiento,
        'obs_emprendimiento'  =>  $faker->paragraph,
        'atencion_panales'  =>  $atencion_panales,
        'obs_atencion_panales'  =>  $faker->paragraph,
        'postrado'              =>  $postrado,
        'obs_postrado'  =>  $faker->paragraph,
        'habitabilidad_casa'    => $habitabilidad_casa,
        'obs_hab_casa'          =>  $faker->paragraph,
        'postulacion_fosis'     =>  $postulacion_fosis,
        'obs_fosis'             =>  $faker->paragraph,
        'fecha_postulacion_fosis'   =>  $fecha_postulacion_fosis,
        'user_id'               =>  \App\User::all()->random()->id,
    ];
});
