<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Concert extends JsonResource
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
            'dateConcert' => $this->dateConcert,
            'name' => $this->name,
            'duration' => $this->duration,
            'free' => $this->free,
            'insitu' => $this->insitu,
            'place' => "/api/places/" . $this->place_id,
            'festival' => "/api/festivals/" . $this->festival_id,
        ];
    }
}
