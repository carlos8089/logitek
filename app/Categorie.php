<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /**
    *
    * @var array
    */
    protected $fillable = ['name'];

    //retrieve a category's subcategories
    public function subcategories(){
        return $this->hasMany(Subcategorie::class);
    }
}
