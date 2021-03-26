<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu', 'place_id'];

    //Relación Concierto-LugarConcierto
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    //Relación Concierto-Festival
    public function festival()
    {
        return $this->belongsTo('App\Festival');
    }

    //Relación Concierto-Recurso
    public function resources()
    {
        return $this->belongsToMany('App\Resource')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Concierto-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}


