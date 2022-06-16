<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    /**
    *
    * @var array
    */
    protected $fillable = ['name'];

    //category's subcategories
    public function subcategories(){
        return $this->hasMany(Subcategorie::class);
    }

    //all solutions in a category
    public function solutions(){
        return $this->hasMany(Solution::class);
    }
}
