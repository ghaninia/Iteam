<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id' ,
        'plan_id' ,
        'status' ,
        'tracking_code'
    ];

    public function user(){
        return $this->belongsTo(User::class) ;
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class) ;
    }

}
