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

    public function category(){
        return $this->belongsTo(Categorie::class);
    }
}
