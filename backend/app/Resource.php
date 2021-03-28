<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name', 'quantity', 'description'];


    //Relación Concierto-Recurso
    public function concerts()
    {
        return $this->belongsToMany('App\Concert')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}
