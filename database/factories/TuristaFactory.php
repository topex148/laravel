<?php

use Faker\Generator as Faker;

$factory->define(App\Turista::class, function (Faker $faker) {
    return [
      'Pais_P' => $faker->country,
      'Estado_P' => $faker->state,
    ];
});
