<?php

namespace Database\Seeders;

use App\Solution;
use Illuminate\Database\Seeder;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Solution::factory()
                        ->count(323)
                        ->create();
    }
}
