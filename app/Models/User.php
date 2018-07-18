<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'is_active',
        'confirmed_email' ,
        'name',
        'family' ,
        'username' ,
        'email',
        'phone' ,
        'fax' ,
        'mobile' ,
        'gender' ,
        'website' ,
        'bio',
        'instagram_account' ,
        'linkedin_account' ,

        'type_assist' ,
        'interplay_fiscal' ,
        'min_salary' ,
        'max_salary' ,

        'province_id',
        'city_id' ,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ] ;

    public function getFullnameAttribute()
    {
        return sprintf("%s %s", $this->attributes['name'], $this->attributes['family']);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class)->withPivot(['expired_at','status'])->withTimestamps() ;
    }

    public function scopePlan()
    {
        
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
