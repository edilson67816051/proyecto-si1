<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;


class Categoria extends Model
{
    use Notifiable;
    public $timestamps = false;
    protected $fillable = [
        'name','descripcion','estado'
    ];

    public function productos()
    {
        return $this->hasMany('App\Producto');
       // return $this->hasMany('App\Producto', 'foreign_key');
    }
}