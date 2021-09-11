<?php

use Illuminate\Database\Seeder;

class ServicioBasicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Agua potable',
            'descripcion'   =>  'acceso a agua potable'
        ]);

        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Luz en su domicilio',
            'descripcion'   =>  'acceso a luz en su domicilio'
        ]);

        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Baño en su vivienda',
            'descripcion'   =>  'acceso a baño en el interior de la vivienda'
        ]);
    }
}
