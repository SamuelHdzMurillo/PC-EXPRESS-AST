<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceTicketController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//OWNER ROUTES

Route::get("owners", [OwnerController::class, 'index']);

Route::post("owner", [OwnerController::class, 'store']);

Route::get("owner/{id}", [OwnerController::class, 'show']);

Route::put("owner/{id}", [OwnerController::class, 'update']);

//DEVICE ROUTES
Route::get('/devices', [DeviceController::class, 'index']);

Route::post('/device', [DeviceController::class, 'store']);

Route::get('/device/{id}', [DeviceController::class, 'show']);

Route::put('/device/{id}', [DeviceController::class, 'update']);

//generar ticekt

Route::get('/devices/{id}/ticket', [DeviceTicketController::class, 'generateTicket']);