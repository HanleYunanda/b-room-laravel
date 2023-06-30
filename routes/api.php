<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/me', [AuthController::class, 'me']);

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('/room', [RoomController::class]);
    Route::apiResource('/user', UserController::class);
    Route::apiResource('/category', CategoryController::class);
    Route::apiResource('/reservation', ReservationController::class);
    Route::apiResource('/tool', ToolController::class);
});

// Route::group([
//     'middleware' => 'sanctum',
//     'prefix' => 'auth'
// ], function() {
//     Route::apiResource('/room', [RoomController::class]);
//     Route::apiResource('/user', UserController::class);
//     Route::apiResource('/category', CategoryController::class);
//     Route::apiResource('/reservation', ReservationController::class);
//     Route::apiResource('/tool', ToolController::class);
// });

// Route::middleware('auth:sanctum')->group(function () {});
