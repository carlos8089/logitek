<?php

use Illuminate\Database\Seeder;

class SubcategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subcategorie::class, 10)->create();
    }
}
