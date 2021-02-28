<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone,
            'assisted_by' => $this->assisted_by,
            'total_referred' => $this->counter,
            'notes' => $this->notes,
            'qr_lik' => $this->qr_link
        ];
    }
}
