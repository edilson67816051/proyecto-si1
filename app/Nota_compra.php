<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota_compra extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id','proveedor_id','user_id','fecha','monto_total', 'estado',
    ];
}
