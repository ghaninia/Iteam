<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
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
    protected $guards = [
        'departement_id'
    ] ;

    public function files(){
        return $this->morphMany(File::class , 'files' ) ;
    }

    public function pic($size = ['thumbnail','full'])
    {
        return $this->files()->whereIn('type' , ['thum'])
    }


}
