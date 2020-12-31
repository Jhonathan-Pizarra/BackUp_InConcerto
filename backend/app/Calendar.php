<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['checkIn_Artist', 'checkOut_Artist', 'comingFrom', 'flyNumber'];

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Tiene
    public function transports()
    {
        return $this->hasMany('App\Transport'); //Eloquent determina la FK automáticamente
    }

}
