<?php

use Faker\Generator as Faker;

$factory->define(App\Turista::class, function (Faker $faker) {
    return [
      'Pais_P' => $faker->sentence,
      'Estado_P' => $faker->sentence,
    ];
});
