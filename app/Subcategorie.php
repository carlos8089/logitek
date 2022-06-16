<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    use HasFactory;
    /**
     *
     * @var array
    */
    protected $fillable = ['categorie_id', 'name'];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function solutions(){
        return $this->hasMany(Solution::class);
    }
}
