<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Autonomia;
use Faker\Generator as Faker;

$factory->define(Autonomia::class, function (Faker $faker) {

    $levantarse_sin_ayuda = $faker->randomElement(['SI', 'NO']);
    $cama_aseo_dormitorio = $faker->randomElement(['SI', 'NO']);
    $asearse_ducharse = $faker->randomElement(['SI', 'NO']);
    $vestirse = $faker->randomElement(['SI', 'NO']);
    $peinarse = $faker->randomElement(['SI', 'NO']);
    $lavarse_dientes = $faker->randomElement(['SI', 'NO']);
    $utilizar_wc = $faker->randomElement(['SI', 'NO']);
    $desplazamiento_dentro_casa = $faker->randomElement(['SI', 'NO']);
    $comer_solo = $faker->randomElement(['SI', 'NO']);
    $tomarse_medicamentos = $faker->randomElement(['SI', 'NO']);
    $salir_calle = $faker->randomElement(['SI', 'NO']);
    $realizar_compras = $faker->randomElement(['SI', 'NO']);
    $uso_medios_transporte = $faker->randomElement(['SI', 'NO']);
    $medico_controles_salud = $faker->randomElement(['SI', 'NO']);
    $colaborar_tareas_hogar = $faker->randomElement(['SI', 'NO']);

    return [
        'am_id'                         =>  \App\AdultoMayor::all()->random()->id,
        'levantarse_sin_ayuda'          =>  $levantarse_sin_ayuda,
        'cama_aseo_dormitorio'          =>  $cama_aseo_dormitorio,
        'asearse_ducharse'              =>  $asearse_ducharse,
        'vestirse'                      =>  $vestirse,
        'peinarse'                      =>  $peinarse,
        'lavarse_dientes'               =>  $lavarse_dientes,
        'utilizar_wc'                   =>  $utilizar_wc,
        'desplazamiento_dentro_casa'    =>  $desplazamiento_dentro_casa,
        'comer_solo'                    =>  $comer_solo,
        'tomarse_medicamentos'          =>  $tomarse_medicamentos,
        'salir_calle'                   =>  $salir_calle,
        'realizar_compras'              =>  $realizar_compras,
        'uso_medios_transporte'         =>  $uso_medios_transporte,
        'medico_controles_salud'        =>  $medico_controles_salud,
        'colaborar_tareas_hogar'        =>  $colaborar_tareas_hogar,
        'user_id'                       =>  \App\User::all()->random()->id,
    ];
});
