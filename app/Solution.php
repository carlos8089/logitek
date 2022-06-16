<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'categorie_id', 'subcategorie_id', 'platform_id', 'os', 'desc','screens', 'site', 'sellable', 'currency', 'amount'
    ];

    /*
    protected $casts = [
        'screens' => 'array'
    ];
    */

    //retrieve a user related a soltuion
    public function user(){
        return $this->belongsTo(User::class);
    }

    //solution's category
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    //solution's subcategory
    public function subcategorie(){
        return $this->belongsTo(Subcategorie::class);
    }

    //solution's platform
    public function platform(){
        return $this->belongsTo(Platform::class);
    }

    public function os(){
        return $this->belongsTo(Os::class);
    }

    //retrieve a soltution's comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
