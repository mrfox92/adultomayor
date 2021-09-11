<?php

use Illuminate\Database\Seeder;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'ESTUDIANTE',
            'obs_ocupacion'   =>  'Actualmente se encuentra estudianto'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'TRABAJADOR',
            'obs_ocupacion'   =>  'Actualmente se encuentra trabajando'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'INDEPENDIENTE',
            'obs_ocupacion'   =>  'Actualmente se encuentra realizando alguna actividad o trabajo de manera independiente'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'OTRA OCUPACION',
            'obs_ocupacion'   =>  'Cualquier otra ocupación que se encuentre realizando actualmente'
        ]);
    }
}
