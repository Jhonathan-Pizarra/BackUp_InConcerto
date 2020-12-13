<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    protected $fillable = ['date', 'food', 'observation', 'quantityLunchs'];

}
