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

    public $timestamps = false ;
    protected $dates = [
        'created_at'
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function team()
    {
        return $this->belongsTo(Team::class) ;
    }

    public function scopeAccepted($query)
    {
        return $query->where("status" , 1 ) ;
    }

    public function scopeNotAccepted($query)
    {
        return $query->where("status" , 0 );
        //* زمانی که وضعیت غیرفعال بود و تماشا داده شده بود *//
    }

    public function scopeRejected($query)
    {
        return $query->where("status" , 2) ;
    }

    public function isRejected()
    {
        return $this->status == 2 ;
    }

    public function isAccepted()
    {
        return $this->status == 1 ;
    }

    public function isNotAccepted()
    {
        return $this->status == 0 ;
    }
}
