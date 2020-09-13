<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cellier;
use Faker\Generator as Faker;

$factory->define(Cellier::class, function (Faker $faker) {
    return [
        "nom" => $faker->name,
        "user_id" => $faker->numberBetween(1, 2),
        "adresse_id" => $faker->numberBetween(1, 2),
    ];
});
