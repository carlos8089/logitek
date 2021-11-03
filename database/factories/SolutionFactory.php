<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Solution;
use App\Categorie;
use App\Subcategorie;
use App\Platform;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Solution::class, function(Faker $faker){
    //$cats = Categorie::all();
    $cat = Categorie::where('id', rand(1,8))->first();
    //$subs = Subcategorie::all();
    $sub = Subcategorie::where('id', rand(1,8))->first();
    //$plats = Platform::all();
    $plat = Platform::where('id', rand(1,4))->first();
    return [
            'user_id' => '16',// $faker->randomDigit,
            'name' => $faker->name,
            'category' => $cat->name,
            'subcategory' => $sub->name,
            'platform' => $plat->name,
            'os' => $faker->streetName,
            'desc' => Str::random(1000),
            'screens' =>serialize(array( $faker->url )),
            'site' => $faker->url,
            'sellable' => $faker->boolean,
    ];
});
