<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\PatientResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PatientCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return PatientResource::collection($this->collection);
    }
}
