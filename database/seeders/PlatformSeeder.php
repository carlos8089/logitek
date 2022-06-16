<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Platform;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            'name' => 'Web'
        ]);
        DB::table('platforms')->insert([
            'name' => 'Mobile'
        ]);
        DB::table('platforms')->insert([
            'name' => 'Desktop'
        ]);
        DB::table('platforms')->insert([
            'name' => 'Server'
        ]);
    }
}
