<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu'];

    //Relación Concierto-LugarConcierto
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    //Pertenece a:
    public function resources()
    {
        return $this->belongsToMany('App\Resource')
            ->withPivot('state')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}


