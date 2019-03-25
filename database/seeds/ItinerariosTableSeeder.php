<?php

use Illuminate\Database\Seeder;

class ItinerariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Itinerario::class, 10)->create();
    }
}
