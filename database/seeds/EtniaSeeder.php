<?php

use Illuminate\Database\Seeder;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Aymara',
            'descripcion'   =>  'Aymara',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Rapa Nui',
            'descripcion'   =>  'Rapa Nui',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Quechua',
            'descripcion'   =>  'Quechua',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Mapuche',
            'descripcion'   =>  'Mapuche',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Atacameño',
            'descripcion'   =>  'Atacameño',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Colla',
            'descripcion'   =>  'Colla',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Alacalufe o Kawashkar',
            'descripcion'   =>  'Alacalufe o Kawashkar',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Yagán',
            'descripcion'   =>  'Yagán',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'        =>  'Diaguita',
            'descripcion'   =>  'Diaguita',
        ]);
    }
}
