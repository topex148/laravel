<?php

use Illuminate\Database\Seeder;

class PrestadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Prestadore::class, 5)->create();
    }
}
