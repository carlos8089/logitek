<?php

use App\Categorie;
use Illuminate\Database\Seeder;
class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('categories')->insert([
            'name' => Str::random(10)
        ]);
        */
        Categorie::factory()
                        ->count(10)
                        ->create();
        //factory(App\Categorie::class, 10)->create();
    }
}
