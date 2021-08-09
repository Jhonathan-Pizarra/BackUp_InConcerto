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
            'festival' => $this->festival->name,
            'user' => $this -> user->name,
            'festival_id' => "/festivales/" . $this->festival_id,
            'user_id' => "/usuarios/" . $this->user_id,
            'festival_pk' => $this->festival_id,
            'user_pk' => $this->user_id,
        ];
    }
}
