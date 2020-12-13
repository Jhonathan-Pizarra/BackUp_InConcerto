<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['type', 'capacity', 'instruments_capacity', 'disponibility', 'licence_plate'];

}
