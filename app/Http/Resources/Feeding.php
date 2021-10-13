<?php

namespace App\Http\Resources;
use App\Models\FeedingPlace;

use Illuminate\Http\Resources\Json\JsonResource;

class Feeding extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this -> date, //Genra LoremIpsum para name, de tipo dateTime
            'food' => $this -> food,
            'observation' => $this ->observation,
            'quantityLunchs' => $this -> quantityLunchs,
            //festival'=>"/festivales/".$this->festival_id,
            'user' => $this -> user->name,
            'artist' => $this -> artist->name,
            'artistLst' => $this -> artist->lastName,
            'fplace' => FeedingPlace::find($this->place_id)->name,
            //'fplace' =>  $this->place_id,
            'user_id' => "/usuarios/".$this -> user_id,
            'artist_id' => "/artistas/".$this -> artist_id,
            'fplace_id' => "/lugares-alimentacion/".$this -> place_id,
            'user_pk' => $this -> user_id, //uso para los selects
            'artist_pk' => $this -> artist_id, //uso para los selects
            'fplace_pk' => $this -> place_id, //uso para los selects
        ];

    }
}
