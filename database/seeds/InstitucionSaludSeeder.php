<?php

use Illuminate\Database\Seeder;

class InstitucionSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InstitucionSalud::class, 1)->create([
            'nombre'    =>  'CESFAM',
            'direccion' =>  'No especificada',
            'localidad' =>  'Máfil'
        ]);
        factory(App\InstitucionSalud::class, 1)->create([
            'nombre'    =>  'CESCOSF',
            'direccion' =>  'No especificada',
            'localidad' =>  'Máfil'
        ]);
        factory(App\InstitucionSalud::class, 1)->create([
            'nombre'    =>  'POSTA RURAL',
            'direccion' =>  'No especificada',
            'localidad' =>  'Máfil'
        ]);
        factory(App\InstitucionSalud::class, 1)->create([
            'nombre'    =>  'RONDA MEDICA',
            'direccion' =>  'No especificada',
            'localidad' =>  'Máfil'
        ]);
        factory(App\InstitucionSalud::class, 1)->create([
            'nombre'    =>  'ATENCION PRIVADA',
            'direccion' =>  'No especificada',
            'localidad' =>  'Máfil'
        ]);
    }
}
