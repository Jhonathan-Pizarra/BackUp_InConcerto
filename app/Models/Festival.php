<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = ['name', 'description','image'];

    //Relacion Festival-Concierto
    public function concerts()
    {
        return $this->hasMany('App\Models\Concert'); //Eloquent determina la FK automáticamente
    }

    //Relacion Festival-Ensayo
    public function essays()
    {
        return $this->hasMany('App\Models\Essay'); //Eloquent determina la FK automáticamente
    }

    //Relacion Festival-Actividades
    public function activities()
    {
        return $this->hasMany('App\Models\ActivityFestival'); //Eloquent determina la FK automáticamente
    }
}
