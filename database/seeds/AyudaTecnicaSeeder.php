<?php

use Illuminate\Database\Seeder;

class AyudaTecnicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AyudaTecnica::class, 1)->create([
            'nombre'        =>  'SILLA RUEDA',
            'descripcion'   =>  'ayuda tecnica SILLA RUEDA'
        ]);

        factory(App\AyudaTecnica::class, 1)->create([
            'nombre'        =>  'BURRO',
            'descripcion'   =>  'ayuda tecnica BURRO'
        ]);

        factory(App\AyudaTecnica::class, 1)->create([
            'nombre'        =>  'BASTÓN',
            'descripcion'   =>  'ayuda tecnica BASTÓN'
        ]);

        factory(App\AyudaTecnica::class, 1)->create([
            'nombre'        =>  'AUDIFONOS',
            'descripcion'   =>  'ayuda tecnica AUDIFONOS'
        ]);

        factory(App\AyudaTecnica::class, 1)->create([
            'nombre'        =>  'CHATAS O PATOS',
            'descripcion'   =>  'ayuda tecnica CHATAS O PATOS'
        ]);
    }
}
