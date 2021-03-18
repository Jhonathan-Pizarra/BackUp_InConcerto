<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Artist extends JsonResource
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
            'ciOrPassport' => $this ->ciOrPassport,
            'artisticOrGroupName' => $this ->artisticOrGroupName,
            'name' => $this ->name,
            'lastName' => $this ->lastName,
            'nationality' => $this ->nationality,
            'mail' => $this ->mail,
            'phone' => $this ->phone,
            'passage' => $this ->passage,
            'instruments' => $this ->instruments,
            'emergencyPhone' => $this ->emergencyPhone,
            'emergencyMail' => $this ->emergencyMail,
            'foodGroup' => $this ->foodGroup,
            'observation' => $this ->observation,
        ];

    }
}
