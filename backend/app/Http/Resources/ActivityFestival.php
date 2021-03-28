<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityFestival extends JsonResource
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
            'date' => $this -> date,
            'description' => $this ->description,
            'observation' => $this -> observation,
            'festival' => "/api/festivals/" . $this->festival_id,
            'user' => "/api/users/" . $this->user_id,
        ];
    }
}