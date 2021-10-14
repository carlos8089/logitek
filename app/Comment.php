<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Solution;

class Comment extends Model
{
    //
    /**
     *
     * @var array
     */

     protected $fillable = ['user_id', 'solution_id', 'content'];

     //retrieve user related to a comment
     public function user(){
         return $this->belongsTo(User::class);
     }

     //retrieve solution related to a comment
     public function solution(){
         return $this->belongsTo(Solution::class);
     }
}
