<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;
use App\Solution;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$user = User::where('id', rand(1,10))->first();
        $solution = Solution::where('id', rand(1,299))->first();

        return [
            //
            'user_id'=>rand(1,10),
            'solution_id'=>$solution->id,
            'content'=>Str::random(500)
        ];
    }
}
