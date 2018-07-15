<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'is_active',
        'name',
        'family' ,
        'username' ,
        'email',
        'phone' ,
        'mobile' ,
        'information',

        'province_id',
        'city_id' ,
        
        'resume_id' ,
        'picture_id' , 
        
    ];

    protected $hidden = [
        'plan_expired_at'
        'password', 
        'remember_token',
    ];

    public function plan(){
        return $this->belongsTo(Plan::class , "plan_id" , 'id') ;
    }

}
