<?php

use Faker\Generator as Faker;

$factory->define(App\Contacto::class, function (Faker $faker) {
    return [
      'nombre' => $faker->lastName,
      'correo' => $faker->freeEmail,
      'Telefono' => $faker->tollFreePhoneNumber,
      'Mensaje' => $faker->sentence,
      'Area' => $faker->word,
      'Asunto' => $faker->sentence,
      'archivo' => $faker->imageURL,
    ];
});
