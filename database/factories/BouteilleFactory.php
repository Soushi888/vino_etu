<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bouteille;
use Faker\Generator as Faker;

$factory->define(Bouteille::class, function (Faker $faker) {
    return [
        "nom" => $faker->name,
        "code_saq" => $faker->bankAccountNumber,
        "pays" => $faker->country,
        "description" => $faker->paragraphs(2, true),
        "prix_saq" => $faker->randomNumber(2),
        "url_saq" => "https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623",
        "url_image" => "https://www.saq.com/media/catalog/product/1/0/10324623-1_1584374899.png",
        "format" => $faker->words(2, true),
        "type_id" => $faker->numberBetween(1, 2)
    ];
});
