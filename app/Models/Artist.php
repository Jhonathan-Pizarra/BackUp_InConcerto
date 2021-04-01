<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [ 'ciOrPassport', 'artisticOrGroupName', 'name', 'lastName', 'nationality',
                            'mail', 'phone', 'passage','instruments',  'emergencyPhone', 'emergencyMail',
                            'foodGroup','observation'];


    //Relacion Itinerarios-Artista
    public function calendars()
    {
        return $this->belongsToMany('App\Models\Calendar')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }


    //Relacion Alimentacion-Artista
    public function feedings()
    {
        return $this->hasMany('App\Models\Feeding'); //Eloquent determina la FK automáticamente
    }

    //Relación artistas-conciertos
    public function concerts()
    {
        return $this->belongsToMany('App\Models\Concert')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Hospedaje-artista
    public function lodgings()
    {
        return $this->belongsToMany('App\Models\Lodging')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }


}
