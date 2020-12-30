<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['dateConcert', 'name', 'duration', 'free', 'insitu'];


    public function concerts()
    {
        return $this->hasMany('App\ConcertResource'); //Eloquent determina la FK automáticamente
    }
}


