<?php

use Illuminate\Database\Seeder;

class TipoDiscapacidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
