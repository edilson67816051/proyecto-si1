<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_venta extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id','cliente_id','user_id','fecha','total_venta', 'estado','decuento',
    ];
}
