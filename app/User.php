<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'name', 'country', 'tel', 'website', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //retrieve user's solutions
    public function solutions(){
        return $this->hasMany(Solution::class);
    }

    //retrieve user's comment
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //retrieve user's message
    function messages(){
        return $this->hasMany(Message::class);
    }

}
