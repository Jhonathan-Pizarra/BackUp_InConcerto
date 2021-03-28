<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    protected $fillable = ['dateEssay', 'name', 'place', 'festival_id'];

    //Relacion Ensayo-Festival
    public function festival()
    {
        return $this->belongsTo('App\Festival');
    }

}
