<?php

namespace App\Http\Resources;

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
            'user' => "/usuarios/".$this -> user_id,
            'artist' => "/artistas/".$this -> artist_id,
            'place' => "/lugares-alimentacion/".$this -> place_id,
        ];

    }
}
