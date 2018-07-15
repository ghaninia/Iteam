<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'fileable_id' ,
        'fileable_type' ,
        'url' , 
        'type'
    ];

    public function files(){
        return $this->morphTo() ;
    }
}
