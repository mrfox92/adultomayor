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
        factory(App\TipoDiscapacidad::class, 5)->create()
            ->each( function ($tipoDiscapacidad) {
                //  2 discapacidades por tipo discapacidad
                $tipoDiscapacidad->discapacidades()->saveMany( factory(App\Discapacidad::class, 2)->create() );
            });

        //  etnias
        factory(App\Etnia::class, 5)->create();
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
        factory(App\TipoVivienda::class, 5)->create();
        //  trabajo baño
        factory(App\TrabajoBano::class, 2)->create();

        //  adultos mayores
        factory(App\AdultoMayor::class, 30)->create();
        
    }
}
