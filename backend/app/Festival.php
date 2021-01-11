<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = ['name', 'description'];

    //Relacion Festival-Concierto
    public function concerts()
    {
        return $this->hasMany('App\Concert'); //Eloquent determina la FK automáticamente
    }

}
