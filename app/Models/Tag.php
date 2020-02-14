<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name' ,
        'slug' ,
        'icon' ,
    ];

    public function teams(){
        return $this->morphedByMany(Team::class , 'tagable') ;
    }

    public function departements(){
        return $this->morphedByMany(Departement::class , 'tagable') ;
    }

    public function skills()
    {
        return $this->hasMany(Skill::class) ;
    }

}
