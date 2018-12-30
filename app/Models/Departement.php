<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'name' ,
        'description' ,
        'permissions'
    ];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class) ;
    }
}
