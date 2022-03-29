<?php

namespace Database\Seeders;

use App\Comment;
use Illuminate\Database\Seeder;

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
        //factory(App\Comment::class, 1000)->create();
    }
}
