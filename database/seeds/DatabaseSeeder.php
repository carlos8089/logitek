<?php

use Database\Seeders\CountrySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 15)->create();
        $this->call([
            CategorieSeeder::class,
            SubcategorieSeeder::class,
            PlatformSeeder::class,
            SolutionSeeder::class,
            CommentSeeder::class,
            CountrySeeder::class
        ]);
    }
}
