<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'category', 'subcategory', 'platform', 'os', 'desc', 'site', 'sellable', 'currency', 'amount'
    ];

}