<?php
namespace App\Models;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'plan_id' ,
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
        'password' ,
        'type_assist' ,
        'interplay_fiscal' ,
        'min_salary' ,
        'max_salary' ,
        'province_id',
        'city_id' ,
        'plan_expired_at' ,
        'plan_created_at' ,
        'email_verified_at' ,
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

    public function information()
    {

        $information = [] ;
        $default = config('timo.panel_default') ;
        $user = User::with(['plan' , 'offers' , 'teams'])->find($this->id) ;

        $information['teams'] = [
            'max'   => $user->plan->attributes['max_create_team'] , //* حداکثر استفاده در پنل فعلی *//
            'current_usage' => (
            $user->plan->id == $default
                ? $user->teams->where('default_plan' , true )->count()
                : $user
                ->teams()
                ->where('default_plan' , false )
                ->whereBetween('created_at' , [$this->plan_created_at , $this->plan_expired_at] )
                ->count()
            ) ,
            'all' => $user->teams->count()
        ];

        $information['offers'] = [
            'max'   => $user->plan->attributes['max_create_offer'] , //* حداکثر تعداد پیشنهاد در پنل فعلی *//
            'current_usage' => (
            $user->plan->id == $default
                ? $user->offers->where('default_plan' , true )->count()
                : $user
                ->teams()
                ->where('default_plan' , false )
                ->whereBetween('created_at' , [$this->plan_created_at , $this->plan_expired_at] )
                ->count()
            ) ,
            'all' => $user->offers->count()
        ];

        return $information ;
    }

    public function porfileNotification()
    {
        return $this->hasOne(PorfileNotification::class) ;
    }

    public static function boot()
    {
        static::created(function ($user){
            $user->porfileNotification()->create() ;
        });

        parent::boot() ;
    }

    public function visitis()
    {
        return $this->hasMany(Visit::class) ;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token)) ;
    }

    public static function canAddTeam($user = null)
    {
        $user = !! $user ? $user : me() ;
        $user = User::with('plan')->whereId($user->id)->withCount([
            'teams' => function ($query) use ($user) {
                $query->where('plan_id' , $user->plan->id )
                    ->where('created_at' , ">=" , $user->plan_created_at ?? $user->created_at ) ;
            }
        ])->first() ;

        if (!! $user)
            return $user->teams_count < $user->plan->max_create_team ;

        return false ;
    }


}
