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

        Storage::deleteDirectory('discapacidadpsd');    //eliminar un directorio determinado
        Storage::deleteDirectory('psd');
        Storage::deleteDirectory('am');
        Storage::deleteDirectory('users');

        //  creamos los directorios de imagenes
        Storage::makeDirectory('discapacidadpsd');
        Storage::makeDirectory('psd');
        Storage::makeDirectory('am');
        Storage::makeDirectory('users');
        
        //  roles
        factory(App\Role::class, 1)->create(['nombre' => 'admin']);
        factory(App\Role::class, 1)->create(['nombre' => 'gestor']);
        factory(App\Role::class, 1)->create(['nombre' => 'invitado']);
        
        //  usuario test admin
        factory(App\User::class, 1)->create([
            'name'  =>  'Angela Hernandez',
            'email' =>  'angelahernandez@gmail.com',
            'sexo'  =>  'F',
            'password'  =>  bcrypt('Angela1234'),
            'role_id'   =>  \App\Role::ADMIN
        ]);
        
        factory(App\User::class, 1)->create([
            'name'  =>  'Test User',
            'email' =>  'test@test.com',
            'sexo'  =>  'M',
            'password'  =>  bcrypt('Test1234'),
            'role_id'   =>  \App\Role::ADMIN
        ]);
        
        factory(App\User::class, 1)->create([
            'name'  =>  'Test User 1',
            'email' =>  'test1@test.com',
            'sexo'  =>  'M',
            'password'  =>  bcrypt('Test1234'),
            'role_id'   =>  \App\Role::GESTOR
        ]);
        
        factory(App\User::class, 1)->create([
            'name'  =>  'Test User 2',
            'email' =>  'test2@test.com',
            'sexo'  =>  'M',
            'password'  =>  bcrypt('Test1234'),
            'role_id'   =>  \App\Role::INVITADO
        ]);
        

        //  Nacionalidad
        //  nivel alfabetizacion
        //  actividades
        //  atenciones
        //  ayudas tecnicas
        //  tipo discapacidad
        //  etnias
        //  previsiones
        //  institucion salud
        //  Nucleo Familiar
        //  Redes adulto mayor
        //  servicios basicos
        //  tipo talleres
        //  tipos viviendas
        //  Patologias
        //  adultos mayores
        //  PSD
        //  beneficios estatales
        //  lista ocupaciones
        //  programas


        $this->call([
            NacionalidadSeeder::class,
            AlfabetizacionSeeder::class,
            ActividadSeeder::class,
            AtencionSeeder::class,
            AyudaTecnicaSeeder::class,
            TipoDiscapacidadSeeder::class,
            EtniaSeeder::class,
            IngresoSeeder::class,
            InstitucionSaludSeeder::class,
            NucleoFamiliarSeeder::class,
            RedesSeeder::class,
            ServicioBasicoSeeder::class,
            TipoTallerSeeder::class,
            TipoViviendaSeeder::class,
            PatologiaSeeder::class,
            AdultoMayorSeeder::class,
            PsdSeeder::class,
            BeneficioEstatalSeeder::class,
            OcupacionSeeder::class,
            ProgramaSeeder::class,

        ]);

    }
}
