<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{

    protected $fillable = ['name', 'type', 'description', 'observation', 'checkIn', 'checkOut'];

    //Relación Hospedaje-Artista
    public function artists()
    {
        return $this->belongsToMany('App\Models\Artist')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }

    //Relación Hospedaje-admins(Users)
    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }


}
