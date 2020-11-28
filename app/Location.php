<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'name', 
        'description', 
        'latitude', 
        'longitude', 
        'altitude', 
        'image'
    ];
}
