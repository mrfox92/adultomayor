<?php

use Illuminate\Database\Seeder;

class AtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Atencion::class, 1)->create([
            'nombre'        =>  'ATENCIÓN AUDITIVA',
            'descripcion'   =>  'ATENCIÓN AUDITIVA'
        ]);

        factory(App\Atencion::class, 1)->create([
            'nombre'        =>  'ATENCIÓN PODOLOGICA',
            'descripcion'   =>  'ATENCIÓN PODOLOGICA'
        ]);

        factory(App\Atencion::class, 1)->create([
            'nombre'        =>  'ATENCIÓN OFTAMOLOGÍA',
            'descripcion'   =>  'ATENCIÓN OFTAMOLOGÍA'
        ]);

        factory(App\Atencion::class, 1)->create([
            'nombre'        =>  'ATENCIÓN LIMPIEZA DE CAÑON',
            'descripcion'   =>  'ATENCIÓN LIMPIEZA DE CAÑON'
        ]);
    }
}
