<?php

use Faker\Generator as Faker;

$factory->define(App\Contacto::class, function (Faker $faker) {
    return [
      'nombre' => $faker->sentence,
      'correo' =>preg_replace('/example\..*/','@domain.com', $faker->unique()->safeEmail),
      'Telefono' => $faker->phoneNumber,
      'Mensaje' => $faker->sentence,
      'Area' => $faker->sentence,
      'Asunto' => $faker->sentence,
      'archivo' => $faker->imageURL,
    ];
});
