<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    /**
    *
    * @var array
    */

    protected $fillable = ['name','indicatif'];
    //retrieve a country's users
    public function users(){
        return $this->hasMany(User::class);
    }
}
