<?php

namespace Database\Seeders;

namespace Database\Seeders;

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
                    ->count(100)
                    ->create();
    }
}
