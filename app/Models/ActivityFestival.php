<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityFestival extends Model
{
    //use HasFactory;
    protected $fillable = ['name', 'date', 'description', 'observation', 'festival_id', 'user_id'];

    //Relación Festival-Actividades
    public function festival()
    {
        return $this->belongsTo('App\Models\Festival');
    }

    //Relación Admin(Responsable)-Actividad
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
