<?php

use Faker\Generator as Faker;

$factory->define(App\Foto::class, function (Faker $faker) {
    return [
      'title' => $faker->word,
      'descripcion' => $faker->sentence,
      'imagen' => $faker->imageURL,
      'Galeria' => $faker->sentence,
      'RIF_Prest' => $faker->randomDigit,
      'id_Zona' => $faker->randomDigit,
      'id_Atrac' => $faker->randomDigit,
      'id_Activi' => $faker->randomDigit,
    ];
});
