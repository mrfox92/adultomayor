<?php

use Illuminate\Database\Seeder;

class ActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'CORONACIÓN DE LA REINA',
            'descripcion'   =>  'actividad coronación de la reina'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'OLIMPIADAS ADULTO MAYOR',
            'descripcion'   =>  'actividad olimpiadas adulto mayor'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'PASAMOS AGOSTO',
            'descripcion'   =>  'actividad pasamos Agosto'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'ENCUENTRO COROS',
            'descripcion'   =>  'actividad encuentro coros'
        ]);
    }
}
