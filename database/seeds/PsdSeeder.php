<?php

use Illuminate\Database\Seeder;

class PsdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PersonaDiscapacitada::class, 30)->create();
    }
}
