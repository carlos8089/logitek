<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    /**
     *
     * @var array
     */

    protected $fillable = ['name'];

    //all platform's solutions
    public function solutions(){
        return $this->hasMany(Solution::class);
    }

    public function oses(){
        return $this->hasMany(Os::class);
    }
}
