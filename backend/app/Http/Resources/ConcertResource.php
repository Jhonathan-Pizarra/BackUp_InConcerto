<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConcertResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'concert' => '/api/concerts/'.$this->concert_id,
            'resource' => '/api/resources/'.$this->resource_id,
            'state' => $this->state,
        ];
    }
}
