<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['checkIn_Artist', 'checkOut_Artist', 'comingFrom', 'flyNumber'];


    //Relacion Itinerarios-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Models\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relacion Itinerarios-Admins(Users)
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Calendario-Transporte
    public function transports()
    {
        return $this->hasMany('App\Models\Transport'); //Eloquent determina la FK automáticamente
    }

}
