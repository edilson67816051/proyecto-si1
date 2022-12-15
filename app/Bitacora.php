<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'Actividad','fecha','id_user',
    ];

   
}
