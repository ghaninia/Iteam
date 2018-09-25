<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag_id' ,
        'name' ,
        'slug' ,
        'description' ,
    ];

    public function teams(){
        return $this->morphedByMany(Team::class , 'tagable') ;
    }

    public function departements(){
        return $this->morphedByMany(Departement::class , 'tagable') ;
    }

    public function skills()
    {
        return $this->morphToMany(Skill::class , 'skillable') ;
    }

    public function childerns()
    {
        return $this->hasMany(Tag::class) ;
    }

    public function parent()
    {
        return $this->belongsTo(Tag::class) ;
    }

    public function scopeParents()
    {
        return $this->whereNull('tag_id') ;
    }

}
