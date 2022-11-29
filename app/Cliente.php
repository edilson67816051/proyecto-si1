<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'ci','nombre','apellido_p','apellido_m','genero','telefono',
    ];
}
