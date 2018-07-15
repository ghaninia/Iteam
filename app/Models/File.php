<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'fileable_id' ,
        'fileable_type' ,
        'size' ,
        'format' ,
        'disk' ,
        'url'
    ];

    public $timestamps = false ;

    protected $dates = [
        'created_at'
    ];

    public function files(){
        return $this->morphTo() ;
    }
}
