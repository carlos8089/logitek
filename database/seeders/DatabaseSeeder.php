<?php

namespace Database\Seeders;

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
            CountrySeeder::class,
            UserSeeder::class,
            CategorieSeeder::class,
            SubcategorieSeeder::class,
            PlatformSeeder::class,
            OsSeeder::class,
            SolutionSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
