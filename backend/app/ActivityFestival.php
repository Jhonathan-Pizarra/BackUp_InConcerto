<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityFestival extends Model
{
    protected $fillable = ['name', 'date', 'description', 'observation'];

    //Relación Festival-Actividad
    public function festival()
    {
        return $this->belongsTo('App\Festival');
    }

}
