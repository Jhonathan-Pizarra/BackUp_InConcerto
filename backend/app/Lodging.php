<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{

    protected $fillable = ['name', 'type', 'description', 'observation', 'checkIn', 'checkOut'];

    //Relación Hospedaje-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Hospedaje-admins
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }


}
