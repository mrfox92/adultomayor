<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //  roles
        factory(App\Role::class, 1)->create(['nombre' => 'admin']);
        //  usuario test admin
        factory(App\User::class, 1)->create([
            'name'  =>  'test',
            'email' =>  'test123@gmail.com',
            'password'  =>  bcrypt('test1234'),
            'role_id'   =>  \App\Role::ADMIN
        ]);
        //  nivel alfabetizacion
        factory(App\Alfabetizacion::class, 6)->create();
        //  actividades
        factory(App\Actividad::class, 20)->create();
        //  atenciones
        factory(App\Atencion::class, 20)->create();
        //  ayudas tecnicas
        factory(App\AyudaTecnica::class, 10)->create();

        //  tipo discapacidad
        factory(App\TipoDiscapacidad::class, 1)->create(['nombre' => 'Ceguera o dificultad para ver']);

        factory(App\TipoDiscapacidad::class, 1)->create(['nombre' => 'Sordera o dificultad para oir']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad en la comunicación']);
        
        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad de Origen Físico']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad psíquica']);

        //  etnias
        // factory(App\Etnia::class, 5)->create();
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Aymara',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Rapa Nui',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Quechua',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Mapuche',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Atacameño',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Colla',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Alacalufe o Kawashkar',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Yagán',
        ]);
        factory(App\Etnia::class, 1)->create([
            'nombre'  =>  'Diaguita',
        ]);
        //  ingresos
        factory(App\Ingreso::class, 6)->create();
        //  instituto salud
        factory(App\InstitucionSalud::class, 6)->create();
        //  Nacionalidad
        factory(App\Nacionalidad::class, 10)->create();
        //  Nucleo Familiar
        factory(App\NucleoFamiliar::class, 3)->create();
        //  Patologias
        factory(App\Patologia::class, 10)->create();
        //  Redes
        factory(App\Red::class, 5)->create();
        //  servicios basicos
        factory(App\ServicioBasico::class, 5)->create();
        //  tipo talleres
        factory(App\TipoTaller::class, 3)->create()
        ->each( function ($tipoTaller) {
            //  5 talleres por tipo taller
            $tipoTaller->talleres()->saveMany( factory(App\Taller::class, 5)->create() );
        });

        //  tipos viviendas
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Casa',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Departamento',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Pieza dentro de la vivienda',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Mejora, mediagua',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Rancho, ruca o choza',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Vivienda de desechos',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'  =>  'Otro tipo de vivienda',
        ]);
        //  trabajo baño
        factory(App\TrabajoBano::class, 2)->create();

        //  adultos mayores
        factory(App\AdultoMayor::class, 30)->create();

        //  Autonomia adulto mayor

        factory(App\Autonomia::class, 10)->create();

        factory(App\Acompanante::class, 10)->create();

        //  Habitabilidad adulto mayor
        factory(App\HabitabilidadVivienda::class, 10)->create();

        // vivienda adulto mayor
        factory(App\ViviendaAm::class, 10)->create();
        //  salud adulto mayor
        factory(App\Salud::class, 10)->create();

        // discapacidad am
        factory(App\DiscapacidadAm::class, 10)->create();
        
    }
}
