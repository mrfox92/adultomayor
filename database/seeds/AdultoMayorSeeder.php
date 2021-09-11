<?php

use Illuminate\Database\Seeder;

class AdultoMayorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdultoMayor::class, 30)->create();
    }
}
