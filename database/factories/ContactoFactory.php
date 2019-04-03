<?php

use Faker\Generator as Faker;

$factory->define(App\Contacto::class, function (Faker $faker) {
    return [
      'nombre' => $faker->sentence,
      'correo' => $faker->freeEmail,
      'Telefono' => $faker->tollFreePhoneNumber,
      'Mensaje' => $faker->sentence,
      'Area' => $faker->sentence,
      'Asunto' => $faker->sentence,
      'archivo' => $faker->imageURL,
    ];
});
