<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        "user_id" ,
        "friend_id" 
    ];

    public function user(){
        return $this->belongsTo( User::class , "user_id" , "id" ) ;
    }

    public function friend(){
        return $this->belongsTo( User::class , "friend_id" , "id" ) ;
    }
}
