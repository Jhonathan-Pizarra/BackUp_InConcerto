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
            'festival' => $this->festival->name,
            'festival_id' => "/festivales/" . $this->festival_id,
            'festival_pk' => $this->festival_id, //uso para el selector
        ];

    }
}
