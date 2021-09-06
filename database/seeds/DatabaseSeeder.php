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

        // $this->call(UserSeeder::class);
        
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

        //  nivel alfabetizacion
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza básica incompleta'
        ]);
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza básica completa'
        ]);
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza media incompleta'
        ]);

        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Enseñanza media completa'
        ]);
        
        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Educación superior incompleta'
        ]);

        factory(App\Alfabetizacion::class, 1)->create([
            'nombre'    =>  'Educación superior completa'
        ]);

        //  Nacionalidad
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Chileno/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Afgano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Albanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Alemán/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Andorrano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Angoleño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Antiguano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Saudí o saudita'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Argelino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Argentino/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Armenio/nia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Australiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Austriaco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Azerbaiyano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bahameño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bangladesí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Barbadense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bareiní'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Belga'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Beliceño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Beninés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bielorruso/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Birmano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Boliviano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bosnio/nia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Botsuano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Brasileño/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Bruneano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Búlgaro/ra'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Burkinés'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Burundés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Butanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Caboverdiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Camboyano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Camerunés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Canadiense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Catarí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Chadiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Chino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Chipriota'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Vaticano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Colombiano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Comorense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Norcoreano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Surcoreano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Marfileño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Costarricense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Croata'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Cubano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Danés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Dominiqués'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ecuatoriano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Egipcio/cia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Salvadoreño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Emiratí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Eritreo/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Eslovaco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Esloveno/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Español/la'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Estadounidense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Estonio/nia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Etíope'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Filipino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Finlandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Fiyiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Francés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Gabonés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Gambiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Georgiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ghanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Granadino/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Griego/ga'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Guatemalteco/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ecuatoguineano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Guineano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Guineano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Guyanés/esa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Haitiano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Hondureño/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Húngaro/ra'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Hindú'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Indonesio/sia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Iraquí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Iraní'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Irlandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Islandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Marshalés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Salomonense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Israelí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Italiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Jamaiquino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Japonés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Jordano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Kazajo/ja'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Keniata'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Kirguiso/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Kiribatiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Kuwaití'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Laosiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Lesotense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Letón/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Libanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Liberiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Libio/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'liechtensteiniano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Lituano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Luxemburgués/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Malgache'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Malasio/sia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Malauí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Maldivo/va'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Maliense, Malí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Maltés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Marroquí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Mauriciano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Mauritano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Mexicano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Micronesio/sia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Moldavo/va'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Monegasco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Mongol/la'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Montenegrino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Mozambiqueño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Namibio/bia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Nauruano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Nepalés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Nicaragüense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Nigerino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Nigeriano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Noruego/ga'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Neozelandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Omaní'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Neerlandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Pakistaní'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Palauano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Panameño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Papú'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Paraguayo/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Peruano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Polaco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Portugués/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Británico/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Centroafricano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Checo/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Macedonio/nia'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Congoleño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Congoleño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Dominicano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sudafricano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ruandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Rumano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ruso/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Samoano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Cristobaleño/ña'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sanmarinense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sanvicentino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Santalucense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Santotomense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Senegalés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Serbio/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Seychellense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sierraleonés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Singapurense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sirio/ria'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Somalí'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ceilanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Suazi'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sursudanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sudanés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Sueco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Suizo/za'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Surinamés/esa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tailandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tanzano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tayiko/ka'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Timorense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Togolés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tongano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Trinitense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tunecino/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Turcomano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Turco/ca'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Tuvaluano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ucraniano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Ugandés/sa'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Uruguayo/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Uzbeko/ka'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Vanuatuense'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Venezolano/a'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Vietnamita'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Yemení'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Yibutiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Zambiano/na'
        ]);
        factory(App\Nacionalidad::class, 1)->create([
            'nombre'    =>  'Zimbabuense'
        ]);
        //  fin nacionalidad

        //  actividades
        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'CORONACIÓN DE LA REINA',
            'descripcion'   =>  'actividad coronación de la reina'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'OLIMPIADAS ADULTO MAYOR',
            'descripcion'   =>  'actividad olimpiadas adulto mayor'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'PASAMOS AGOSTO',
            'descripcion'   =>  'actividad pasamos Agosto'
        ]);

        factory(App\Actividad::class, 1)->create([
            'nombre'        =>  'ENCUENTRO COROS',
            'descripcion'   =>  'actividad encuentro coros'
        ]);

        //  atenciones
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
        //  ayudas tecnicas
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



        //  tipo discapacidad
        factory(App\TipoDiscapacidad::class, 1)->create(['nombre' => 'Discapacidad visual']);

        factory(App\TipoDiscapacidad::class, 1)->create(['nombre' => 'Discapacidad auditiva']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad en el lenguaje']);
        
        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad motora']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad psíquica']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad Intelectual']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad Espectro autista']);

        factory(App\TipoDiscapacidad::class, 1)
        ->create(['nombre' => 'Discapacidad Desarrollo']);

        //  etnias
        // factory(App\Etnia::class, 5)->create();
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

        //  previsiones
        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación AFP',
            'descripcion'   =>  'Jubilación AFP'
        ]);

        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación estatal',
            'descripcion'   =>  'Jubilación estatal'
        ]);

        factory(App\Ingreso::class, 1)->create([
            'nombre'        =>  'Jubilación por discapacidad',
            'descripcion'   =>  'Jubilación por discapacidad'
        ]);

        //  instituto salud
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
        
        //  Nucleo Familiar
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

        //  Patologias
        factory(App\Patologia::class, 10)->create();

        //  Redes adulto mayor
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
        //  servicios basicos
        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Agua potable',
            'descripcion'   =>  'acceso a agua potable'
        ]);

        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Luz en su domicilio',
            'descripcion'   =>  'acceso a luz en su domicilio'
        ]);

        factory(App\ServicioBasico::class, 1)->create([
            'nombre'        =>  'Baño en su vivienda',
            'descripcion'   =>  'acceso a baño en el interior de la vivienda'
        ]);
        
        //  tipo talleres
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

        //  tipos viviendas
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Casa',
            'descripcion'   =>  'Casa',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Departamento',
            'descripcion'   =>  'Departamento',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Pieza dentro de la vivienda',
            'descripcion'   =>  'Pieza dentro de la vivienda',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Mejora, mediagua',
            'descripcion'   =>  'Mejora, mediagua',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Rancho, ruca o choza',
            'descripcion'   =>  'Rancho, ruca o choza',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Vivienda de desechos',
            'descripcion'   =>  'Vivienda de desechos',
        ]);
        factory(App\TipoVivienda::class, 1)->create([
            'nombre'        =>  'Otro tipo de vivienda',
            'descripcion'   =>  'Otro tipo de vivienda',
        ]);
        //  trabajo baño
        // factory(App\TrabajoBano::class, 2)->create();

        //  adultos mayores
        // factory(App\AdultoMayor::class, 30)->create();

        //  Autonomia adulto mayor

        // factory(App\Autonomia::class, 10)->create();

        // factory(App\Acompanante::class, 10)->create();

        //  Habitabilidad adulto mayor
        // factory(App\HabitabilidadVivienda::class, 10)->create();

        // vivienda adulto mayor
        // factory(App\ViviendaAm::class, 10)->create();
        //  salud adulto mayor
        // factory(App\Salud::class, 10)->create();

        // discapacidad am
        // factory(App\DiscapacidadAm::class, 10)->create();


        //  PSD
        // factory(App\PersonaDiscapacitada::class, 30)->create();
        //  beneficios estatales
        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Aporte Previsional Solidario de Invalidez (APSI)',
            'descripcion'   =>  'Destinado para personas de 18 a 65 años, consiste en un aporte mensual de $467.894 para quienes reciben una pensión previsional de invalidez (que sea inferior a $141.374) por su discapacidad física o mental. Entre los requisitos se encuentra el pertenecer al 60% más vulnerable de la población, según el Registro Social de Hogares.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Aporte Previsional Solidario de Vejez (APSV)',
            'descripcion'   =>  'Aquellos beneficiarios del APSI que cumplan 65 años o hayan superado esa edad pueden acceder a este aporte mensual que incrementa las pensiones percibidas en el sistema contributivo, siempre y cuando cumplan con las condiciones. Dependiendo de la edad, el dinero a entregar va desde los $467.894 hasta $501.316.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión Básica Solidaria de Invalidez (PBSI)',
            'descripcion'   =>  'Orientado para personas discapacitadas de 18 a 65 años, pero entrega $158.339 a las que no tienen derecho a pensión en algún régimen previsional. El monto se reajusta el 1 de julio de cada año y una de las condiciones para recibirlo es pertenecer al 60% más vulnerable de la población.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión Básica Solidaria de Vejez (PBSV)',
            'descripcion'   =>  'Los beneficiarios de la PBSI podrán acceder a esta ayuda social cuando hayan cumplido o superado los 65 años, si es que cumplen las condiciones. La cantidad del monto depende de la edad del solicitante y va desde los $158.339 hasta los $169.649.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Subsidio para menores de edad con discapacidad mental',
            'descripcion'   =>  'No solo entrega un aporte monetario mensual de $73.282 para personas menores de 18 años, sino que también les garantiza la atención médica gratuita en consultorios y hospitales del Servicio Nacional de Salud. Para obtener el beneficio se exige que el menor de edad no posea previsión social ni debe estar recibiendo ningún otro tipo de subsidio, entre otros requisitos.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión de Invalidez del sistema de pensiones (AFP)',
            'descripcion'   =>  'Para afiliados de Administradoras de Fondos de Pensiones (AFP) menores a 65 años que sean total o parcialmente discapacitados de manera física o mental, se les entrega un monto por un periodo de tres años. Eso sí, tal invalidez no debe haber sido provocada por accidente de trabajo o por una denominada "enfermedad profesional".'
        ]);

        //  lista ocupaciones
        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'ESTUDIANTE',
            'obs_ocupacion'   =>  'Actualmente se encuentra estudianto'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'TRABAJADOR',
            'obs_ocupacion'   =>  'Actualmente se encuentra trabajando'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'INDEPENDIENTE',
            'obs_ocupacion'   =>  'Actualmente se encuentra realizando alguna actividad o trabajo de manera independiente'
        ]);

        factory(App\Ocupacion::class, 1)->create([
            'nombre'    =>  'OTRA OCUPACION',
            'obs_ocupacion'   =>  'Cualquier otra ocupación que se encuentre realizando actualmente'
        ]);

        //  programas adulto mayor

        //  programas
        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'Programa vínculos',
            'descripcion'   =>  'En acompañamiento continuo para las personas mayores de 65 años que ingresan al nuevo Subsistema de Seguridades y Oportunidades,  entregándoles herramientas psicosociales que permitan fortalecer  su identidad, autonomía y sentido de pertenencia. El apoyo psicosocial es individual y grupal;  el acompañamiento es directo y personalizado en el lugar donde habitan las personas mayores. El programa promueve  el proceso de vinculación de las  personas mayores al entorno  y  entrega bonos de protección y prestaciones monetarias.',
            'objetivo'      =>  'Entregar herramientas a personas mayores en situación de vulnerabilidad social para que logren vincularse con la red de apoyo social de su comuna y con sus pares.',
            'requisitos'    =>  'Personas mayores de 65 años o más, que vivan solos o acompañados de una persona de cualquier edad, y que ingresan al nuevo Subsistema de Seguridades y Oportunidades del Ingreso Ético Familiar.No se postula, pues las nóminas con los potenciales beneficiarios del programa emana desde el Ministerio de Desarrollo Social',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA MASAMA',
            'descripcion'   =>  'corresponde a una intervención promocional y preventiva en salud, mediante la participación de adultos mayores en actividades grupales de educación para la salud y autocuidado, estimulación funcional y estimulación cognitiva, desarrollada junto al equipo del Centro de Salud, bajo un enfoque en salud integral y comunitaria.',
            'objetivo'      =>  'contribuir a mejorar la calidad de vida de las personas adultos mayores, prolongando su autovalencia, con una atención integral en base al modelo de Salud Familiar y Comunitaria.',
            'requisitos'    =>  'No especificados',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA CENTRO DIURNO',
            'descripcion'   =>  'El Programa Centros Diurnos posee dos componentes; Subvención a Centros Diurnos Comunitarios y Centros Diurnos Referenciales, lo cuales se configuran a partir de una batería de talleres a los que la persona mayor accede acorde a su plan de intervención individual. Los talleres se agrupan en tres áreas: Personal, Social y Comunitaria. Existe trabajo con la comunidad en que está inserto el Centro Diurno a fin de integrar a la persona mayor. Ambos componentes cuentan con un Fondo Concursable para los proyectos presentados por municipios o instituciones sin fines de lucro con experiencia en el trabajo con personas mayores. La ejecución se realiza bajo los lineamientos de SENAMA a través de una Guía de Operaciones la que se supervisa periódicamente en terreno, así como la correcta utilización de los recursos. La supervisión da cuenta del cumplimiento de los objetivos planteados a través del cálculo de una batería de indicadores.',
            'objetivo'      =>  'Promover y fortalecer la autonomía e independencia en las personas mayores, que permita contribuir a retrasar su pérdida de funcionalidad, manteniéndolos en su entorno familiar y social, a través de una asistencia periódica a un Centro Diurno donde se entregarán temporalmente servicios sociosanitarios y de apoyo.',
            'requisitos'    =>  '1.- Edad del adulto mayor. Ingresan prioritariamente aquellos adultos mayores de mayor edad.

            2.- Situación socioeconómica según calificación socioeconómica del registro social de hogares.  Si los adultos mayores postulantes cuentan con la misma edad, tiene prioridad quien se encuentre en un tramo de calificación socioeconómica inferior.
            
            3.- Aquellos que residan lo más próximo a la ubicación del Centro Diurno.',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA INTERVENCIÓN DOMICILIARIA RURAL',
            'descripcion'   =>  'No especificada',
            'objetivo'      =>  'No especificados',
            'requisitos'    =>  'No especificados',
        ]);
        
    }
}
