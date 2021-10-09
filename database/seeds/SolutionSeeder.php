<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class SolutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solutions')->insert([
            'user_id' => rand(1,5),
            'name' => Str::random(10),
            'category' => Str::random(10),
            'subcategory' => Str::random(10),
            'platform' => Str::random(10),
            'os' => Str::random(10),
            'desc' => Str::random(10),
            'site' => Str::random(10),
            'sellable' => rand(0,1),
            'currency' => Str::random(10),
            'amount' => rand(100,1000)
        ]);
    }
}
