<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bouteille;
use Faker\Generator as Faker;

$factory->define(Bouteille::class, function (Faker $faker) {
    return [
        "nom" => $faker->name,
        "image" => $faker->url,
        "code_saq" => $faker->bankAccountNumber,
        "pays" => $faker->country,
        "description" => $faker->paragraphs(2, true),
        "prix_saq" => $faker->randomNumber(2),
        "url_saq" => $faker->url,
        "image_url" => $faker->url,
        "format" => $faker->words(2, true),
        "type_id" => $faker->numberBetween(1, 2)
    ];
});
