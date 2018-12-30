<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'key' ,
        'value'
    ];

    public static function set($key , $value = null)
    {
        if ( is_array($key) )
            return Option::update($key) ;
        elseif( is_null($value) && is_string($key) )
            return Option::where('key',$key)->update(['value' => $value]) ;
    }

    public static function get($key , $default)
    {
        $data = Option::where("key",$key)->first() ;
        if (!!$data)
            return $data->value ;
        return $default ;
    }
}
