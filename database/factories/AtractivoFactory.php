<?php

use Faker\Generator as Faker;

$factory->define(App\Atractivo::class, function (Faker $faker) {
    return [
      'zona_id' => $faker->randomDigit,
      'Nombre_Atractivo' => $faker->word,
      'Ubicacion' => $faker->address,
      'Descripcion_Atractivo' => $faker->sentence,
    ];
});
