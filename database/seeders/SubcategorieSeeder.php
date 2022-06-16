<?php

namespace Database\Seeders;

use App\Subcategorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubcategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Education
            DB::table('subcategories')->insert([
                'name' => 'Language',
                'categorie_id'=> '1'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Science',
                'categorie_id'=> '1'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'History',
                'categorie_id'=> '1'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Economy',
                'categorie_id'=> '1'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Other in Education',
                'categorie_id'=> '1'
            ]);
        //Entertainment
            DB::table('subcategories')->insert([
                'name' => 'Other in Entertainment',
                'categorie_id'=> '2'
            ]);
        //Games
            DB::table('subcategories')->insert([
                'name' => 'Other in Games',
                'categorie_id'=> '3'
            ]);
        //Health Care
            DB::table('subcategories')->insert([
                'name' => 'Other in Health Care',
                'categorie_id'=> '4'
            ]);
        //Life Style
            DB::table('subcategories')->insert([
                'name' => 'Fashion',
                'categorie_id'=> '5'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Other in Fashion',
                'categorie_id'=> '5'
            ]);

        //Productivity
            DB::table('subcategories')->insert([
                'name' => 'Accounting',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'HR Management',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Task Planner',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Text Editor',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'File exchange',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Messaging',
                'categorie_id'=> '6'
            ]);
            DB::table('subcategories')->insert([
                'name' => 'Other in Productivity',
                'categorie_id'=> '6'
            ]);
    }
}
