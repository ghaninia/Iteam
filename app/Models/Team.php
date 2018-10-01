<?php
namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id' ,
        'plan_id' ,
        'name' ,
        'expired_at' ,
        'status' ,

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

    protected $dates = [
        'expired_at'
    ];

    public function tags()
    {
        return $this->morphToMany( Tag::class , "tagable" );
    }

    public function skills()
    {
        return $this->morphToMany( Skill::class, 'skillable' );
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

    public function plan()
    {
        return $this->belongsTo(Plan::class) ;
    }

    public static function userCreate(array $data)
    {
        $data['plan_id'] = me()->plan->id ;
        $data['expired_at'] = Carbon::now()->subDay( me()->plan->max_life ) ;
        $data['user_id'] = me()->id ;
        $data['default_plan'] = config("timo.panel_default") != me()->plan->id ? false : true ;
        return static::insert($data) ;
    }

    public function visits()
    {
        return $this->hasMany(Visit::class) ;
    }

    public function getRouteKeyName()
    {
        return "slug" ;
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value) ;
    }


    public function isExpire()
    {
        return ($this->status == 2 && $this->expired_at < now()) ? true : false ;
    }
}
