<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['type', 'capacity', 'instruments_capacity', 'disponibility', 'licence_plate', 'calendar_id'];

    //Relacion Transporte-Calendario
    public function calendar()
    {
        return $this->belongsTo('App\Models\Calendar');
    }

}
