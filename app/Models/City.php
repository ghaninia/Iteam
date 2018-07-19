<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function province()
    {
        return $this->belongsTo(Province::class) ;
    }
    public function users()
    {
        return $this->hasMany(User::class) ;
    }
}
