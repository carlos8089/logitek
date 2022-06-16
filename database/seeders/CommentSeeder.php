<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Comment;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
                    ->count(1000)
                    ->create();
    }
}
