<?php

use Faker\Generator as Faker;
use App\Models\Profesiones;

$factory->define(Profesiones::class, function (Faker $faker) {
    return [
        "nombre" => $faker->jobTitle,
        "dia" => $faker->numberBetween($min = 1, $max = 31),
        "mes" => $faker->numberBetween($min = 1, $max = 12),
    ];
});

