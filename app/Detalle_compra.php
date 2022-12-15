<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_compra extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nota_id','producto_id','cantidad','precio_compra','sub_total',
    ];
}
