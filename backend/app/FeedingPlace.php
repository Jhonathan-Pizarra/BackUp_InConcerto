<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedingPlace extends Model
{
    protected $fillable = ['name', 'address', 'permit', 'aforo'];


    //Relación LugarAlimentacion-Alimetacion
    public function feedings()
    {
        return $this->hasMany('App\Feeding', 'place_id'); //En este caso necesitamos especificarle a cual fk nos referimos
    }

}
