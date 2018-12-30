<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'tracking_code' ,
        'ticketable_id' ,
        'ticketable_type' ,
        'subject' ,
        'text'
    ];

    public function files(){
        return $this->morphMany( File::class , 'fileable' ) ;
    }

    public function ticketable()
    {
        return $this->morphTo() ;
    }

}
