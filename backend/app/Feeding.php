<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    protected $fillable = ['date', 'food', 'observation', 'quantityLunchs'];

    //Relación Alimentacion-Usuario
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Relación Alimentacion-Artista
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    //Relación Feeding-Place
    public function feeding_place()
    {
        return $this->belongsTo('App\FeedingPlace');
    }

}
