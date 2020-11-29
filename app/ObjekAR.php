<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekAR extends Model
{
    protected $fillable = [ 'nama', 
                            'name', 
                            'deskripsi',
                            'description',
                            'audio'];
}
