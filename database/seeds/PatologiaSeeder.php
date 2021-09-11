<?php

use Illuminate\Database\Seeder;

class PatologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Patologia::class, 10)->create();
    }
}
