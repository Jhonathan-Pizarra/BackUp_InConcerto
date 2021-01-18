<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['checkIn_Artist', 'checkOut_Artist', 'comingFrom', 'flyNumber'];

    //Relación Artistas-Calendario(Itinerario)
/*    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }*/

    //Relacion Itinerarios-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relacion Itinerarios-Admins(Users)
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Calendario-Admin(Users)
/*    public function user()
    {
        return $this->belongsTo('App\User'); //Eloquent determina la FK automáticamente
    }*/

    //Relación Calendario-Transporte
    public function transports()
    {
        return $this->hasMany('App\Transport'); //Eloquent determina la FK automáticamente
    }

}
