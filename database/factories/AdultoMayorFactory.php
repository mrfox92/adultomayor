<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AdultoMayor;
use Faker\Generator as Faker;

$factory->define(AdultoMayor::class, function (Faker $faker) {

    $fecha_nacimiento = $faker->dateTimeBetween($startDate = '-90 years', $endDate = '-65 years', $timezone = 'America/New_York');
    $estado_club_am = $faker->randomElement(['No participa', 'Quiere participar']);
    $recibe_medicamento = $faker->randomElement(['SI', 'NO']);
    $emprendimiento = $faker->randomElement(['SI', 'NO']);
    $atencion_panales = $faker->randomElement(['SI', 'NO']);
    $postrado = $faker->randomElement(['SI', 'NO']);
    $habitabilidad_casa = $faker->randomElement(['SI', 'NO']);
    $postulacion_fosis = $faker->randomElement(['SI', 'NO']);
    $cuidado_ninos = $faker->randomElement(['SI', 'A VECES', 'RARA VEZ', 'NO']);
    $cuidado_psd = $faker->randomElement(['SI', 'NO']);
    $inscripcion_conadi = $faker->randomElement(['SI', 'NO', 'NO SABE', 'NO APLICA']);
    $fecha_postulacion_fosis = $faker->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = 'America/New_York');
    $vacunado = $faker->randomElement(['SI', 'NO']);
    $controles_dia = $faker->randomElement(['SI', 'NO']);


    return [
        'rut'                           =>  $faker->uuid,   //  identificador unico
        'num_documento'                 =>  $faker->uuid,
        'nombres'                       =>  $faker->name,
        'apellidos'                     =>  $faker->lastName,
        'fecha_nacimiento'              =>  $fecha_nacimiento,
        'sexo'                          =>  $faker->randomElement(['F', 'M']),
        'direccion'                     =>  $faker->streetAddress,
        'telefono'                      =>  $faker->tollFreePhoneNumber,
        'nacionalidad_id'               =>  \App\Nacionalidad::all()->random()->id,
        'alfabetizacion_id'             =>  \App\Alfabetizacion::all()->random()->id,
        'porcentaje_rsh'                =>  $faker->unique()->numberBetween(20, 70),
        'estado_club_am'                =>  $estado_club_am,
        'tipo_vivienda_id'              =>  \App\TipoVivienda::all()->random()->id,
        'nucleo_familiar_id'            =>  \App\NucleoFamiliar::all()->random()->id,
        'institucion_salud_id'          =>  \App\InstitucionSalud::all()->random()->id,
        'recibe_medicamentos'           =>  $recibe_medicamento,
        'obs_medicamentos'              =>  $faker->paragraph,
        'emprendimiento'                =>  $emprendimiento,
        'obs_emprendimiento'            =>  $faker->paragraph,
        'atencion_panales'              =>  $atencion_panales,
        'obs_atencion_panales'          =>  $faker->paragraph,
        'postrado'                      =>  $postrado,
        'obs_postrado'                  =>  $faker->paragraph,
        'habitabilidad_casa'            =>  $habitabilidad_casa,
        'obs_hab_casa'                  =>  $faker->paragraph,
        'postulacion_fosis'             =>  $postulacion_fosis,
        'obs_fosis'                     =>  $faker->paragraph,
        'cuidado_ninos'                 =>  $cuidado_ninos,
        'cuidado_psd'                   =>  $cuidado_psd,
        'inscripcion_conadi'            =>  $inscripcion_conadi,
        'fecha_postulacion_fosis'       =>  $fecha_postulacion_fosis,
        'vacunado'                      =>  $vacunado,
        'obs_vacunado'                  =>  $faker->paragraph,
        'controles_dia'                 =>  $controles_dia,
        'obs_controles'                 =>  $faker->paragraph,
        'user_id'                       =>  \App\User::all()->random()->id,
    ];
});
