<?php

use Illuminate\Database\Seeder;

class AtractivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Atractivo::class, 10)->create();
    }
}
