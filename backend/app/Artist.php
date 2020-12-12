<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [ 'ciOrPassport', 'artisticOrGroupName', 'name', 'lastName', 'nationality',
                            'mail', 'phone', 'passage','instruments',  'emergencyPhone', 'emergencyMail',
                            'foodGroup','observation'];
}
