<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id' ,
        'plan_id' ,
        'transaction_id' ,
        'ref_id' ,
        'tracking_code' ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class) ;
    }

    public function transaction()
    {
        return $this->hasOne( Transaction::class , 'ref_id' , 'ref_id') ;
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value) ;
    }

//    public function getRouteKeyName()
//    {
//        return 'tracking_code' ;
//    }

}
