<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedingPlace extends Model
{
    protected $fillable = ['name', 'address', 'permit', 'aforo'];

}
