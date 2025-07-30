<?php

namespace Database\Seeders;

use App\Models\Hotel\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Decameron Cartagena',
                'address' => 'Calle 23 #58-25',
                'city' => 'Cartagena',
                'nit' => '12345678-9',
                'max_rooms' => 42,
            ],
            [
                'name' => 'Decameron Santa Marta',
                'address' => 'Carrera 10 #20-15',
                'city' => 'Santa Marta',
                'nit' => '12345678-8',
                'max_rooms' => 30,
            ],
            [
                'name' => 'Decameron Barú',
                'address' => 'Km 7 Isla Barú',
                'city' => 'Cartagena',
                'nit' => '12345678-7',
                'max_rooms' => 25,
            ]
        ];

        foreach ($hotels as $hotelData) {
            $hotel = Hotel::create($hotelData);

            $roomSets = match ($hotel->name) {
                'Decameron Cartagena' => [
                    ['type' => 'Estándar', 'accommodation' => 'Sencilla', 'quantity' => 20],
                    ['type' => 'Junior', 'accommodation' => 'Triple', 'quantity' => 10],
                    ['type' => 'Suite', 'accommodation' => 'Doble', 'quantity' => 5],
                ],
                'Decameron Santa Marta' => [
                    ['type' => 'Estándar', 'accommodation' => 'Doble', 'quantity' => 15],
                    ['type' => 'Junior', 'accommodation' => 'Cuádruple', 'quantity' => 10],
                ],
                'Decameron Barú' => [
                    ['type' => 'Suite', 'accommodation' => 'Triple', 'quantity' => 12],
                ],
                default => []
            };

            foreach ($roomSets as $room) {
                $hotel->roomAssignments()->create([
                    'id' => (string) Str::ulid(),
                    'type' => $room['type'],
                    'accommodation' => $room['accommodation'],
                    'quantity' => $room['quantity'],
                ]);
            }
        }
    }
}
