<?php

use Illuminate\Database\Seeder;

class ActividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Actividade::class, 10)->create();
    }
}
