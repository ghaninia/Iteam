<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'departement_id' ,
        'province_id' ,
        'city_id' ,
        'village_id' ,
        
        'name' , 
        'family' ,
        'username' ,
        'email' ,
        'mobile' ,
        'website' ,
        'phone' ,
        'fax' ,
        'gender' ,
        'information' ,
        'password' ,
    ];

    protected $guarded = [
        'departement_id'
    ] ;

    public function fileable(){
        return $this->morphMany(File::class , 'fileable' ) ;
    }

    public function picture(){
        return $this-$this->files()->format('image')->first();
    }

    public function tickets()
    {
        return $this->morphMany(Ticket::class , "ticketable") ;
    }


}
