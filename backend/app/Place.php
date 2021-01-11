<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name','address','permit', 'aforo', 'description'];

    //Relación Concierto-LugarConcierto
    public function concerts()
    {
        return $this->hasMany('App\Concert'); //Eloquent determina la FK automáticamente
    }

}
