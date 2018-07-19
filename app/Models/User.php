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

    public function plan(){
        return $this->belongsTo(Plan::class) ;
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

    public function getRouteKeyName()
    {
        return 'username' ;
    }

    public function logTeam()
    {
        $cpct = 0 ;
        if ( $this->plan->id == config('timo.default_plan_id') )
        {
            $cpct = $this->teams()->where('default_plan' , true )->count() ;
        }else{
            $cpct = $this->teams()->whereBetween('created_at' , [
                $this->plan_created_at ,
                $this->plan_expired_at ,
            ])->count() ;
        }
        return [
            'all' => $this->teams->count() , // tedade team haye k sakhte
            'mct' => $this->plan->max_create_team , //max_create_team
            'cpct'=> $cpct // tedade
        ];
    }
}
