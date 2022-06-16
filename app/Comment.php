<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
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
