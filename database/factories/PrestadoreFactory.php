<?php

use Faker\Generator as Faker;

$factory->define(App\Prestadore::class, function (Faker $faker) {
    return [
        'RIF' => $faker->unique()->numberBetween($min = 100000000, $max = 900000000),
        'Telefono' => $faker->unique()->tollFreePhoneNumber,
        'RTN' => $faker->unique()->numberBetween($min = 10000, $max = 90000),
        'DescripcionServicio' => $faker->sentence,
        'DescripcionPrestador' => $faker->sentence,
        'DescripcionActividad' => $faker->sentence,
        'Nombre' => $faker->lastName,
        'imagen' => $faker->imageURL,
        'Facebook' => $faker->URL,
        'Twitter' => $faker->URL,
        'Instagram' => $faker->URL,
        'userId' => $faker->unique()->numberBetween($min = 6, $max = 50),
        'Fecha_Final' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
    ];
});
