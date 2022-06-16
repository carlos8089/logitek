<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mobile
        DB::table('os')->insert([
            'name' => 'Android',
            'platform_id' => 2
        ]);
        DB::table('os')->insert([
            'name' => 'IOS',
            'platform_id' => 2
        ]);
        //Desktop
        DB::table('os')->insert([
            'name' => 'Windows',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'MacOS',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Debian',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Ubuntu',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Other Debian Distro',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Kali',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Parrot',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Other Security OS',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Fedora',
            'platform_id' => 3
        ]);
        DB::table('os')->insert([
            'name' => 'Red Hat Family',
            'platform_id' => 3
        ]);
        //Server
        DB::table('os')->insert([
            'name' => 'Debian Server',
            'platform_id' => 4
        ]);
        DB::table('os')->insert([
            'name' => 'Ubuntu Server',
            'platform_id' => 4
        ]);
        DB::table('os')->insert([
            'name' => 'Windows Server',
            'platform_id' => 4
        ]);
    }
}
