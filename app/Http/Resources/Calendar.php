<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Calendar extends JsonResource
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
            'checkIn_Artist' => $this -> checkIn_Artist,
            'checkOut_Artist' => $this -> checkOut_Artist,
            'comingFrom' => $this ->comingFrom,
            'flyNumber' => $this -> flyNumber,
            'artist'=> Artist::collection($this->artists),
            //'articles' => ArticleResource::collection($this->articles),
        ];
    }
}
