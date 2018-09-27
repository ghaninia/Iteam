<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'status' ,
        'default_plan' ,
        'user_id' ,
        'user_ip' ,
        'team_id' ,
        'content' ,
        'viewed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function team()
    {
        return $this->belongsTo(Team::class) ;
    }

}
