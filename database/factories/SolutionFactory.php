<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Categorie;
use App\Subcategorie;
use App\Platform;

class SolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$cats = Categorie::all();
        $cat = Categorie::where('id', rand(1,8))->first();
        //$subs = Subcategorie::all();
        $sub = Subcategorie::where('id', rand(1,8))->first();
        //$plats = Platform::all();
        $plat = Platform::where('id', rand(1,4))->first();
        return [
                'user_id' => '16',// $faker->randomDigit,
                'name' => $this->faker->name,
                'category' => $cat->name,
                'subcategory' => $sub->name,
                'platform' => $plat->name,
                'os' => $this->faker->streetName,
                'desc' => Str::random(1000),
                'screens' =>serialize(array( $this->faker->url )),
                'site' => $this->faker->url,
                'sellable' => $this->faker->boolean,
        ];
    }
}
