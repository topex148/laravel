<?php

use Faker\Generator as Faker;

$factory->define(App\Itinerario::class, function (Faker $faker) {
    return [

      'RIF_4' => $faker->randomDigit,
      'id_P_3' => $faker->randomDigit,
      'id_Cliente_1' => $faker->randomDigit,
      'Fecha_Inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
      'Fecha_Final' => $faker->date($format = 'Y-m-d', $max = 'tommorrow'),
    ];
});
