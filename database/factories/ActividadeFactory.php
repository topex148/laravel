<?php

use Faker\Generator as Faker;

$factory->define(App\Actividade::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence,
        'descripcion' => $faker->sentence,
    ];
});
