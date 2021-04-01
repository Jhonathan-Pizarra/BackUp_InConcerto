<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{

    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu', 'festival_id', 'place_id'];


    //Relación Concierto-LugarConcierto
    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    //Relación Concierto-Festival
    public function festival()
    {
        return $this->belongsTo('App\Models\Festival');
    }

    //Relación Concierto-Recurso
    public function resources()
    {
        return $this->belongsToMany('App\Models\Resource')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Concierto-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Models\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}


