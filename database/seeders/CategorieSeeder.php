<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Education'
        ]);
        DB::table('categories')->insert([
            'name' => 'Entertainment'
        ]);
        DB::table('categories')->insert([
            'name' => 'Games'
        ]);
        DB::table('categories')->insert([
            'name' => 'Health Care'
        ]);
        DB::table('categories')->insert([
            'name' => 'Life Style'
        ]);
        DB::table('categories')->insert([
            'name' => 'Productivity'
        ]);
    }
}
