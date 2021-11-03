<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;

class Subcategorie extends Model
{
    //
    /**
     *
     * @var array
    */
    protected $fillable = ['categorie_id', 'name'];

    public function categorie(){
        return $this->belongsTo('App\Categorie', 'categorie_id');
    }
}
