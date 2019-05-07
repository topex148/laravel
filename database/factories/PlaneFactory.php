<?php

use Faker\Generator as Faker;

$factory->define(App\Plane::class, function (Faker $faker) {
    return [
      'name' => $faker->lastName,
      'imagen' => $faker->imageURL,
      'precio' => $faker->unique()->numberBetween($min = 1, $max = 100),
      'descripcion' => $faker->sentence,
      'Fecha_Inicio' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years', $timezone = null),
      'Fecha_Final' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
      'Publicidad' => $faker->unique()->word,
    ];
});
