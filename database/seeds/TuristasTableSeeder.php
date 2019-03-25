<?php

use Illuminate\Database\Seeder;

class TuristasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Turista::class, 10)->create();
    }
}
