<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CellierBouteille;
use Faker\Generator as Faker;

$factory->define(CellierBouteille::class, function (Faker $faker) {
    return [
        "bouteille_id" => $faker->numberBetween(1, 20),
        "cellier_id" => $faker->numberBetween(1, 5),
        "quantite" => $faker->randomDigit,
        "date_achat" => $faker->dateTimeThisDecade,
        "garde_jusqua" => $faker->dateTimeBetween("-2 years", "+10 years"),
        "notes" => $faker->paragraph,
        "prix" => $faker->randomNumber(2),
        "millesime" => $faker->year
    ];
});
