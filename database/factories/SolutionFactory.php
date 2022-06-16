<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Categorie;
use App\Os;
use App\Platform;
use App\Subcategorie;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;

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
        $cat = Categorie::where('id', rand(1,6))->first();
        //var_dump($cat);
        //$subs = Subcategorie::all();
        $subs = Subcategorie::where('categorie_id', $cat->id);
        $sub = $subs->where('id', $subs->min('id'))->first();
        //var_dump($sub);
        //$plats = Platform::all();
        $plat = Platform::where('id', rand(2,4))->first();
        $oses = Os::where('platform_id', $plat->id);
        $os = $oses->where('id', $oses->min('id'))->first();
        //var_dump()
        return [
            'user_id' => '16',// $faker->randomDigit,
                'name' => $this->faker->name,
                'categorie_id' => $cat->id,
                'subcategorie_id' => $sub->id,
                'platform_id' => $plat->id,
                'os_id' => $os->id,
                'desc' => Str::random(1000),
                'screens' =>serialize(array( $this->faker->url )),
                'site' => $this->faker->url,
                'sellable' => $this->faker->boolean,
        ];
    }
}
