<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Solution;
use App\User;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('id', rand(1,10))->first();
        $solution = Solution::where('id', rand(1,450))->first();

        return [
            //
            'user_id'=>$user,
            'solution_id'=>$solution,
            'content'=>Str::random(500)
        ];
    }
}
