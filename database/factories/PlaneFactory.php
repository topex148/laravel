<?php

use Faker\Generator as Faker;

$factory->define(App\Plane::class, function (Faker $faker) {
    return [
      'Fecha_Inicio' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years', $timezone = null),
      'Fecha_Final' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
      'Publicidad' => $faker->unique()->word,
    ];
});
