<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Essay extends JsonResource
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
            'dateEssay' => $this->dateEssay,
            'name' => $this->name,
            'place' => $this->place,
            'festival' => "/api/festivals/" . $this->festival_id,
        ];

    }
}
