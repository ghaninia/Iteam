<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PorfileNotification extends Model
{

    protected $fillable = [
        'when_login' ,
        'when_create_team' ,
        'when_create_offer' ,
        'when_edit_profile' ,
        'when_myteamhave_offer' ,
        'when_expired_panel' ,
        'when_offer_confirmed'
    ] ;

    public $timestamps = false ;

}
