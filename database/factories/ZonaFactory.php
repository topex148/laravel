<?php

use Faker\Generator as Faker;

$factory->define(App\Zona::class, function (Faker $faker) {
    return [
      'nombre' => $faker->sentence,
      'Descripcion_Zona' => $faker->sentence,
    ];
});
