<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{

    protected $fillable = ['name', 'type', 'description', 'observation', 'checkIn', 'checkOut'];

}
