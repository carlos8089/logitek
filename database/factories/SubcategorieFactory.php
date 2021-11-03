<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subcategorie;
use Faker\Generator as Faker;

$factory->define(Subcategorie::class, function (Faker $faker) {
    return [
        'categorie_id'=>rand(1,9),
        'name'=>$faker->name,
    ];
});
