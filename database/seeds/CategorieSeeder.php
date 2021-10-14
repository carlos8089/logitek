<?php

use App\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
