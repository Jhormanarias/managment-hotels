<?php

namespace App\Http\Resources\Hotel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'address'    => $this->address,
            'city'       => $this->city,
            'nit'        => $this->nit,
            'max_rooms'  => $this->max_rooms,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
