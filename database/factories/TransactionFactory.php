<?php

/** @var Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(\App\Transaction::class, function (Faker $faker) {
    return [
        "bouteille_id" => $faker->numberBetween(1, 9),
        "cellier_id" => $faker->numberBetween(1, 2),
        "quantite" => $faker->randomDigit,
        "date_achat" => $faker->dateTimeThisDecade,
        "garde_jusqua" => $faker->dateTimeBetween("-2 years", "+10 years"),
        "notes" => $faker->paragraph,
        "prix" => $faker->randomNumber(2),
        "millesime" => $faker->year
    ];
});
