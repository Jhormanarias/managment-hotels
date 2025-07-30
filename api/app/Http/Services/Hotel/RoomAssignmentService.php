<?php

namespace App\Http\Services\Hotel;

use App\Models\Hotel\Hotel;
use App\Models\Hotel\RoomAssignment;
use Illuminate\Validation\ValidationException;

class RoomAssignmentService
{
    public function assign(Hotel $hotel, array $data): RoomAssignment
    {
        // Validación 2: combinación única
        $exists = $hotel->roomAssignments()
            ->where('type', $data['type'])
            ->where('accommodation', $data['accommodation'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'type' => ['Esta combinación ya fue registrada para este hotel.']
            ]);
        }

        // Validación 3: no superar max_rooms
        $totalAssigned = $hotel->roomAssignments()->sum('quantity');
        $newTotal = $totalAssigned + $data['quantity'];

        if ($newTotal > $hotel->max_rooms) {
            throw ValidationException::withMessages([
                'quantity' => ['La cantidad total supera el máximo permitido para este hotel.']
            ]);
        }

        return $hotel->roomAssignments()->create($data);
    }

    public function list(Hotel $hotel)
    {
        return $hotel->roomAssignments;
    }

    public function update(RoomAssignment $assignment, array $data): RoomAssignment
    {
        $hotel = $assignment->hotel;

        // Verificar si se cambia la combinación y ya existe en otro registro
        $exists = $hotel->roomAssignments()
            ->where('id', '!=', $assignment->id)
            ->where('type', $data['type'])
            ->where('accommodation', $data['accommodation'])
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'type' => ['Ya existe esa combinación en este hotel.']
            ]);
        }

        // Verificar que no se exceda el total permitido
        $totalSinEsta = $hotel->roomAssignments()
            ->where('id', '!=', $assignment->id)
            ->sum('quantity');

        $newTotal = $totalSinEsta + $data['quantity'];

        if ($newTotal > $hotel->max_rooms) {
            throw ValidationException::withMessages([
                'quantity' => ['El total supera el límite de habitaciones para este hotel.']
            ]);
        }

        $assignment->update($data);
        return $assignment;
    }

    public function delete(RoomAssignment $assignment): void
    {
        $assignment->delete();
    }

}
