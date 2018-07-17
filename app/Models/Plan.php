<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'price' ,
        'max_create_team' ,
        'offer_daily' ,
        'offer_month' ,
        'offer_year'  ,
        'max_tag_offer'
    ];

    public function users()
    {
        return $this->hasMany(User::class) ;
    }
}
