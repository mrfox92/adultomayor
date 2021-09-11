<?php

use Illuminate\Database\Seeder;

class NucleoFamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\NucleoFamiliar::class, 1)->create([
            'nombre'        =>  'NUCLEAR',
            'descripcion'   =>  'Tipo familia nuclear'  
        ]);

        factory(App\NucleoFamiliar::class, 1)->create([
            'nombre'        =>  'EXTENSA',
            'descripcion'   =>  'Tipo familia extensa'  
        ]);

        factory(App\NucleoFamiliar::class, 1)->create([
            'nombre'        =>  'MONOPARENTAL',
            'descripcion'   =>  'Tipo familia monoparental'  
        ]);

        factory(App\NucleoFamiliar::class, 1)->create([
            'nombre'        =>  'SOLO',
            'descripcion'   =>  'Tipo familia solo'  
        ]);
    }
}
