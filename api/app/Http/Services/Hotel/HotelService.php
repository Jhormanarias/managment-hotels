<?php

namespace App\Http\Services\Hotel;

use App\Models\Hotel\Hotel;
use Illuminate\Support\Collection;

class HotelService
{
    public function list(): Collection
    {
        return Hotel::all();
    }

    public function create(array $data): Hotel
    {
        return Hotel::create($data);
    }

    public function update(Hotel $hotel, array $data): Hotel
    {
        $hotel->update($data);
        return $hotel;
    }

    public function delete(Hotel $hotel): void
    {
        $hotel->delete();
    }
}
