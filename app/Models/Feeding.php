<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{

    protected $fillable = ['date', 'food', 'observation', 'quantityLunchs', 'artist_id', 'user_id', 'place_id'];

    //Relación Alimentacion-Usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Relación Alimentacion-Artista
    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }

    //Relación Feeding-Place
    public function feeding_place()
    {
        return $this->belongsTo('App\Models\FeedingPlace');
    }

}
