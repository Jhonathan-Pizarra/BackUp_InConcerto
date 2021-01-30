<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConcertResource extends Model
{
    protected $fillable = ['concert_id', 'resource_id','state'];
}
