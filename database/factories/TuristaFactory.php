<?php

use Faker\Generator as Faker;

$factory->define(App\Turista::class, function (Faker $faker) {
    return [
      'Pais_P' => $faker->country,
      'Estado_P' => $faker->state,
      'edad' => $faker->numberBetween($min = 10, $max = 90),
      'genero' => $faker->randomElement($array = array ('Masculino', 'Femenino')),
      'userId' => $faker->unique()->numberBetween($min = 6, $max = 50),

    ];
});
