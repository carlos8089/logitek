<?php

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
        factory(App\Categorie::class, 10)->create();
    }
}
