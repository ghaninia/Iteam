<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name' ,
        'description' ,
        'price' ,
        'max_create_team' ,
        'max_create_offer' ,
        'count_skill' ,
        'sms_notification'
    ];

    public function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->withPivot(['expired_at','status'])
            ->withTimestamps()  ;
    }

    public function files(){
        return $this->morphMany( File::class , 'fileable' ) ;
    }

}
