<?php

use Faker\Generator as Faker;

$factory->define(App\Itinerario::class, function (Faker $faker) {
    return [

      'RIF_4' => $faker->unique()->numberBetween($min = 100000000, $max = 900000000),
      'id_P_3' => $faker->randomDigit,
      'id_Cliente_1' => $faker->randomDigit,
      'Fecha_Inicio' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years', $timezone = null),
      'Fecha_Final' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
    ];
});
