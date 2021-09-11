<?php

use Illuminate\Database\Seeder;

class RedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Municipalidad',
            'num_contacto'  =>  ''
        ]);
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Salud',
            'num_contacto'  =>  ''
        ]);
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Bomberos',
            'num_contacto'  =>  ''
        ]);
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Carabineros',
            'num_contacto'  =>  ''
        ]);
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Iglesia',
            'num_contacto'  =>  ''
        ]);
        factory(App\Red::class, 1)->create([
            'nombre'        =>  'Agrupación',
            'num_contacto'  =>  ''
        ]);
        
    }
}
