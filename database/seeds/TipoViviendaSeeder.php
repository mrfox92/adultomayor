<?php

use Illuminate\Database\Seeder;

class TipoViviendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Casa',
            'descripcion'   =>  'Casa',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Departamento',
            'descripcion'   =>  'Departamento',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Pieza dentro de la vivienda',
            'descripcion'   =>  'Pieza dentro de la vivienda',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Mejora, mediagua',
            'descripcion'   =>  'Mejora, mediagua',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Rancho, ruca o choza',
            'descripcion'   =>  'Rancho, ruca o choza',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Vivienda de desechos',
            'descripcion'   =>  'Vivienda de desechos',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Otro tipo de vivienda',
            'descripcion'   =>  'Otro tipo de vivienda',
        ]);
    }
}
