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
        'die_day' ,
        'count_skill' ,
        'sms_notification' ,
        'default'
    ];

    public function files(){
        return $this->morphMany( File::class , 'fileable' ) ;
    }

}
