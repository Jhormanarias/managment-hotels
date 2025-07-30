<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\RoomAssignmentController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);


Route::apiResource('hotels', HotelController::class);

Route::prefix('hotels/{hotel}')->group(function () {
    Route::get('room-assignments', [RoomAssignmentController::class, 'index']);
    Route::post('room-assignments', [RoomAssignmentController::class, 'store']);
});

Route::put('room-assignments/{roomAssignment}', [RoomAssignmentController::class, 'update']);
Route::delete('room-assignments/{roomAssignment}', [RoomAssignmentController::class, 'destroy']);

// Route::middleware('auth:sanctum')->group(function () {

//     Route::post('/logout', [LogoutController::class, 'logout']);
    
//     Route::get('/hotels', [HotelController::class, 'index']);
//     Route::get('/hotels/{id}', [HotelController::class, 'show']);


//     Route::middleware(EnsureUserIsAdmin::class)->group(function () {
//         Route::post('/hotels', [HotelController::class, 'store']);
//         Route::put('/hotels/{product}', [HotelController::class, 'update']);
//         Route::delete('/hotels/{product}', [HotelController::class, 'destroy']);

//     });
// });