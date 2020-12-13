<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityFestival extends Model
{
    protected $fillable = ['name', 'date', 'description', 'observation'];

}
