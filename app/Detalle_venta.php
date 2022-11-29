<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nota_id','producto_id','cantidad','precio_venta','sub_total',
    ];
}
