<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name', 'quantity', 'description'];

    //Tiene:
    public function concert_resources()
    {
        return $this->hasMany('App\ConcertResource'); //Eloquent determina la FK automáticamente
    }

}
