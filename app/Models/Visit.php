<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'user_id' ,
        'team_id' ,
        'ip' ,
        'mac_address' ,
        'user_agent'
    ] ;

    public function team()
    {
        return $this->belongsTo(Team::class) ;
    }

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

}
