<?php

use Faker\Generator as Faker;

$factory->define(App\Prestadore::class, function (Faker $faker) {
    return [
        'RIF' => $faker->unique()->randomDigit,
        'Telefono' => $faker->unique()->phoneNumber,
        'RTN' => $faker->unique()->randomDigit,
        'DescripcionServicio' => $faker->sentence,
        'DescripcionPrestador' => $faker->sentence,
        'Nombre' => $faker->sentence,
        'imagen' => $faker->imageURL,
        'Facebook' =>preg_replace('/example\..*/','@domain.com', $faker->unique()->safeEmail),
        'Twitter' =>preg_replace('/example\..*/','@domain.com', $faker->unique()->safeEmail),
        'Instagram' =>preg_replace('/example\..*/','@domain.com', $faker->unique()->safeEmail),
    ];
});
