<?php

use Illuminate\Database\Seeder;

class TipoTallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TipoTaller::class, 1)->create([
            'nombre'        =>  'Talleres Oficina Adulto Mayor',
            'descripcion'   =>  'Talleres realizados por la oficina del adulto mayor'    
        ])->each( function ($tipoTaller) {
            //  5 talleres por tipo taller
            $tipoTaller->talleres()->saveMany(
                factory(App\Taller::class, 1)->create([
                    'nombre'            =>  'COSTURA',
                    'descripcion'       =>  'Taller de costura',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'COCINA',
                    'descripcion'   =>  'Taller de cocina',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'USO CELULARES',
                    'descripcion'   =>  'Taller uso de celulares',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'BAILE',
                    'descripcion'   =>  'Taller de Baile',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'JUEGOS DE SALÓN',
                    'descripcion'   =>  'Taller juegos de salón',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'FOLKLOR',
                    'descripcion'   =>  'Taller de Folklor',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'MANUALIDADES',
                    'descripcion'   =>  'Taller de manualidades',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'ASISTENCIA JURÍDICA',
                    'descripcion'   =>  'Taller de asistencia jurídica',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'ACTIVIDAD FÍSICA',
                    'descripcion'   =>  'Taller de actividad física',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ])
            );
        });

        factory(App\TipoTaller::class, 1)->create([
            'nombre'        =>  'Talleres de Salud',
            'descripcion'   =>  'Talleres de salud para el adulto mayor'
        ])->each( function ($tipoTaller) {

            $tipoTaller->talleres()->saveMany(

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'PREVENCIÓN DE CAÍDAS',
                    'descripcion'   =>  'Taller para prevención de caídas',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'ARTROSIS Y ARTRITIS',
                    'descripcion'   =>  'Taller Artrosis y artritis',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'SALUD MENTAL',
                    'descripcion'   =>  'Taller salud mental',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'ATENCIÓN Y MEMORIA',
                    'descripcion'   =>  'Taller atención y memoria',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'EXPRESIÓN DE EMOCIONES',
                    'descripcion'   =>  'Taller de expresión de emociones',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

                factory(App\Taller::class, 1)->create([
                    'nombre'        =>  'HIERBAS MEDICINALES',
                    'descripcion'   =>  'Taller de hierbas medicinales',
                    'tipo_taller_id'    =>  $tipoTaller->id
                ]),

            );
        });

    }
}
