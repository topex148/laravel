<?php
use App\User;
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
         $this->call(PermissionsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(PackagesTableSeeder::class);
         $this->call(ActividadesTableSeeder::class);
         $this->call(AtractivosTableSeeder::class);
         $this->call(ContactosTableSeeder::class);
         $this->call(FotosTableSeeder::class);
         $this->call(ItinerariosTableSeeder::class);
         $this->call(PlanesTableSeeder::class);
         $this->call(PrestadoresTableSeeder::class);
         $this->call(TuristasTableSeeder::class);
         $this->call(ZonasTableSeeder::class);


    }
}
