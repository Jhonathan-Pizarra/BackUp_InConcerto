<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu'];

    //Pertenece a:
    public function resources()
    {
        return $this->belongsToMany('App\Resource')
            ->withPivot('state')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}


