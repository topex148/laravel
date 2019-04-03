<?php

use Faker\Generator as Faker;

$factory->define(App\Prestadore::class, function (Faker $faker) {
    return [
        'RIF' => $faker->unique()->numberBetween($min = 100000000, $max = 900000000),
        'Telefono' => $faker->unique()->tollFreePhoneNumber,
        'RTN' => $faker->unique()->numberBetween($min = 10000, $max = 90000),
        'DescripcionServicio' => $faker->sentence,
        'DescripcionPrestador' => $faker->sentence,
        'Nombre' => $faker->lastName,
        'imagen' => $faker->imageURL,
        'Facebook' => $faker->freeEmail,
        'Twitter' => $faker->freeEmail,
        'Instagram' => $faker->freeEmail,
    ];
});
