<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    protected $fillable = ['date', 'food', 'observation', 'quantityLunchs', 'artist_id'];

    //Pertenece a
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function feeding_place()
    {
        return $this->belongsTo('App\FeedingPlace');
    }

}
