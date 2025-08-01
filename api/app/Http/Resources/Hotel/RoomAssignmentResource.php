<?php

namespace App\Http\Resources\Hotel;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'type'          => $this->type,
            'accommodation' => $this->accommodation,
            'quantity'      => $this->quantity,
            'hotel_id'      => $this->hotel_id,
            'created_at'    => $this->created_at->toDateTimeString(),
        ];
    }
}
