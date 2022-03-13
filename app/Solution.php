<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Solution extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'category', 'subcategory', 'platform', 'os', 'desc','screens', 'site', 'sellable', 'currency', 'amount'
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

    //retrieve a soltution's comments
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
