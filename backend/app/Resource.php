<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = ['name', 'quantity', 'description'];


    //Pertenece a:
    public function concerts()
    {
        return $this->belongsToMany('App\Concert')
            ->withPivot('state')
            ->withTimestamps(); //Eloquent determina la FK automáticamente
    }
}
