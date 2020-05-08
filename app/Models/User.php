<?php
namespace App\Models;
use App\Notifications\ResetPassword;
use App\Notifications\VerfiedEmailUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        "plan_user_id" ,
        "plan_id" ,
        'is_active',
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
        'plan_uid' ,
        'email_verified_at' ,
        "remember_token"
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at' ,
        'email_verified_at' ,
        'plan_uid' ,
        'updated_at' ,
        "is_active" ,
        "id"
    ] ;

    protected $guarded = [
        "id"
    ];

    //* relation complex *//
    public function plans(){
        return $this->belongsToMany(Plan::class)->withPivot([
            "status" ,
            "uid" ,
            "expire_at"
        ])->withTimestamps();
    }

    public function plansUser()
    {
        return $this->hasMany( PlanUser::class ) ;
    }

    public function planUser()
    {
        return $this->belongsTo( PlanUser::class ) ;
    }

    public function plan()
    {
        return $this->belongsTo( Plan::class ) ;
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

    public function logs()
    {
        return $this->hasMany( Log::class ) ;
    }

    public function visitis()
    {
        return $this->hasMany(Visit::class) ;
    }

    public function porfileNotification()
    {
        return $this->hasOne(PorfileNotification::class) ;
    }

    public function myPlanTeams()
    {
        return $this->hasMany( Team::class , "plan_user_id" , "plan_user_id" ) ;
    }

    //* boot model event *//
    public static function boot()
    {
        parent::boot() ;

        static::created(function ($user){

            //create profile notification options
            $user->porfileNotification()->create() ;
            $user->plansUser()->create([
                "plan_id" => config("timo.panel_default")
            ]);

        }) ;
    }

    //* slug *//
    public function getRouteKeyName()
    {
        return 'username' ;
    }

    //* notification *//
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token)) ;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerfiedEmailUser );
    }

    //* accessor *//
    public function getFullnameAttribute()
    {
        return sprintf("%s %s", $this->attributes['name'], $this->attributes['family']);
    }

    //* scope and funcs *//
    public function information()
    {

         $user = User::withCount([
            "teams AS team_all" ,
            "teams AS team_current_plan_usage" => function($Query){
                return $Query->where([
                    "teams.plan_user_id" => $this->plan_user_id
                ]) ;
            } ,
            "offers AS offer_all" ,
            "offers AS offer_current_plan_usage" => function($Query){
                return $Query->where([
                    "offers.plan_user_id" => $this->plan_user_id
                ]) ;
            } ,
            "skills"
        ])->find( $this->id );

        $plan = $this->plan ;

        $information = [
            "teams" => [
                "current_name" => $plan->name ,
                'max'   => $plan->max_create_team ,
                'current_usage' => $user->team_current_plan_usage ,
                'all' => $user->team_all
            ] ,
            "offers" => [
                'max'   => $plan->max_create_offer , //* حداکثر تعداد پیشنهاد در پنل فعلی *//
                'current_usage' => $user->offer_current_plan_usage ,
                'all' => $user->offer_all
            ] ,
            "skill" => [
                "max" => $plan->count_skill ,
                "current_usage" => $user->skills_count
            ]
        ];

        return $information ;
    }

    public function completedProfilePrecent()
    {
        $items = User::select([
            'id' ,
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
            'province_id',
            'city_id' ,
        ])
        ->withCount("skills")
        ->where("id" , me()->id )
        ->first()->toArray() ;

        $len = count($items) ;
        $counter = 0 ;
        foreach ($items as $key => $value ){
            if ( !! $value ){
                $counter++ ;
            }
        }

        return @ceil( ($counter * 100) / $len ) ;
    }


    //کسایی که من دنبالشان میکنم
    public function followers(){
        return $this->hasMany( Follow::class , "user_id" , "id" ) ;
    }

    public function following(){
        return $this->hasMany( Follow::class , "friend_id" , "id") ;
    }

}
