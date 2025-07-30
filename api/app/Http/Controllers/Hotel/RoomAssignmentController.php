<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\AssignRoomRequest;
use App\Http\Requests\Hotel\UpdateRoomAssignmentRequest;
use App\Http\Resources\Hotel\RoomAssignmentResource;
use App\Http\Services\Hotel\RoomAssignmentService;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\RoomAssignment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomAssignmentController extends Controller
{
    public function __construct(private RoomAssignmentService $service) {}

    public function store(AssignRoomRequest $request, Hotel $hotel): JsonResponse
    {
        $assignment = $this->service->assign($hotel, $request->validated());
        return response()->json(new RoomAssignmentResource($assignment), 201);
    }

    public function index(Hotel $hotel): JsonResponse
    {
        return response()->json(RoomAssignmentResource::collection($this->service->list($hotel)));
    }

    public function update(UpdateRoomAssignmentRequest $request, RoomAssignment $roomAssignment): JsonResponse
    {
        $updated = $this->service->update($roomAssignment, $request->validated());
        return response()->json(new RoomAssignmentResource($updated));
    }

    public function destroy(RoomAssignment $roomAssignment): JsonResponse
    {
        $this->service->delete($roomAssignment);
        return response()->json(null, 204);
    }
}
