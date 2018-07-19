<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name' ,
        'plan_id' ,
        'plan_expired_at' ,
        'plan_created_at' ,

        'price' ,
        'max_create_team' ,
        'max_create_offer' ,

    ];

    public function users()
    {
        return $this
            ->belongsToMany(User::class)
            ->withPivot(['expired_at','status'])
            ->withTimestamps()  ;
    }


}
