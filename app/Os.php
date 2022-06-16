<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Os extends Model
{
    use HasFactory;
    /**
     *
     * @var array
     */

    protected $fillable = ['name', 'platform'];

    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
