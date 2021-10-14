<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Solution;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = User::where('id', rand(1,10))->first();
    $solution = Solution::where('id', rand(1,450))->first();

    return [
        //
        'user_id'=>$user,
        'solution_id'=>$solution,
        'content'=>Str::random(500)
    ];
});
