<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = "logs" ;

    protected $fillable = [
        "user_id" ,
        "key"
    ];

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function getCreatedAtAttribute( $value )
    {
        return (new Verta($value)) ;
    }

}
