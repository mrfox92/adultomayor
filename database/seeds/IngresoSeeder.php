<?php

use Illuminate\Database\Seeder;

class IngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación AFP',
            'descripcion'   =>  'Jubilación AFP'
        ]);

        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación estatal',
            'descripcion'   =>  'Jubilación estatal'
        ]);

        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación por discapacidad',
            'descripcion'   =>  'Jubilación por discapacidad'
        ]);
    }
}
