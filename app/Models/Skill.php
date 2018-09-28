<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $fillable = [
        'tag_id' ,
        'name' ,
        'description' ,
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class) ;
    }

    public function teams()
    {
        return $this->morphToMany( Team::class , "skillable" ) ;
    }

    public function users()
    {
        return $this->morphToMany( User::class , "skillable" ) ;
    }

}
