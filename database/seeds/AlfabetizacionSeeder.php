<?php

use Illuminate\Database\Seeder;

class AlfabetizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza básica incompleta'
        ]);
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza básica completa'
        ]);
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza media incompleta'
        ]);

        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza media completa'
        ]);
        
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Educación superior incompleta'
        ]);

        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Educación superior completa'
        ]);
    }
}
