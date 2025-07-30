<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\StoreHotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Http\Resources\Hotel\HotelResource;
use App\Http\Services\Hotel\HotelService;
use App\Models\Hotel\Hotel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function __construct(private HotelService $hotelService) {}

    public function index(): JsonResponse
    {
        return response()->json(HotelResource::collection($this->hotelService->list()));
    }

    public function store(StoreHotelRequest $request): JsonResponse
    {
        $hotel = $this->hotelService->create($request->validated());
        return response()->json(new HotelResource($hotel), 201);
    }

    public function show(Hotel $hotel): JsonResponse
    {
        return response()->json(new HotelResource($hotel));
    }

    public function update(UpdateHotelRequest $request, Hotel $hotel): JsonResponse
    {
        $hotel = $this->hotelService->update($hotel, $request->validated());
        return response()->json(new HotelResource($hotel));
    }

    public function destroy(Hotel $hotel): JsonResponse
    {
        $this->hotelService->delete($hotel);
        return response()->json(null, 204);
    }
}
