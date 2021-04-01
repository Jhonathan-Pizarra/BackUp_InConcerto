<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lodging extends JsonResource
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
            'name' => $this -> name,
            'type' => $this -> type,
            'description' => $this -> description,
            'observation' => $this -> observation,
            'checkIn' => $this -> checkIn,
            'checkOut' => $this -> checkOut,
        ];
    }
}
