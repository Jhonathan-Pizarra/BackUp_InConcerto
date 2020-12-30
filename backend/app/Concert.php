<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu'];


    public function concert_resources()
    {
        return $this->hasMany('App\ConcertResource'); //Eloquent determina la FK automáticamente
    }
}


