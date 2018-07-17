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
        'plan_expired_at',
        'password', 
        'remember_token',
    ];

    public function plan(){
        return $this->belongsTo(Plan::class , "plan_id" , 'id') ;
    }

    public function files(){
        return $this->morphMany( File::class , 'fileable' ) ;
    }

    public function skills()
    {
        return $this->morphToMany( Skill::class , "skillable" ) ;
    }

    public function offers()
    {
        return $this->hasMany(Offer::class , "user_id" , 'id') ;
    }

    public function teams()
    {
        return $this->hasMany(Team::class , "user_id" , 'id' ) ;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class) ;
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class , "ticketable") ;
    }

}
