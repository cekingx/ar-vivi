<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $fillable = [
        'owner', 
        'phone', 
        'email', 
        'nama_tempat', 
        'description', 
        'latitude', 
        'longitude', 
        'image'
    ];
}
