<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {



      //factory(App\User::class, 1)->create();



      Role::create([
          'name'       => 'Admin',
          'slug'       => 'admin',
          'description' => 'Todos los permisos',
          'special'    => 'all-access',
      ]);

      Role::create([
        'name'       => 'Prestador',
        'slug'       => 'prestador',
        'description' => 'Algunos permisos',
        'special'    => 'no-access',

      ]);

      Role::create([
        'name'       => 'Turista',
        'slug'       => 'turista',
        'description' => 'Ningun permisos',
        'special'    => 'no-access',
      ]);


      $user = new User();
      $user->name = 'Admin';
      $user->email = 'admin@example.com';
      $user->password = bcrypt('secret');
      $user->save();
      $role_user = Role::where('name', 'Admin')->first();
      $user->roles()->attach($role_user);


  }
}
