<?php

use Faker\Generator as Faker;

$factory->define(App\Package::class, function (Faker $faker) {
    return [
        'Fecha_Inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'Fecha_Final' => $faker->date($format = 'Y-m-d', $max = 'tommorrow'),
    ];
});
