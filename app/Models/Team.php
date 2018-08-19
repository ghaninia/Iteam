<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id' ,
        'plan_id' ,
        'name' ,
        'default_plan' ,
        'expired' ,
        'expire_day' ,
        // etelaate tamas
        'phone' ,
        'fax' ,
        'mobile' ,
        'email',
        'website' ,

        'excerpt' ,
        'content' ,
        'address' ,
        'required_gender' ,
        'count_member' ,
        'type_assist' ,
        'interplay_fiscal' , 
        'min_salary' ,
        'max_salary' ,
        'province_id' ,
        'city_id'
    ];


    protected $hidden = [
        'phone' ,
        'fax' ,
        'mobile' ,
        'email',
        'website' ,
    ] ;

    public function tags()
    {
        return $this->morphToMany(Tag::class , "tagable" );
    }

    public function skill()
    {
        return $this->morphedByMany(Skill::class , "skillable") ;
    }

    // creator
    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function offers()
    {
        return $this->hasMany(Offer::class) ;
    }

    

}
