<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceTicketController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\CatalogController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// Rutas para obtener todos los usuarios y crear uno nuevo
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);

// Rutas para mostrar, actualizar y eliminar un usuario específico
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Owner routes
Route::prefix('owners')->group(function () {
    Route::get('/', [OwnerController::class, 'index']);
    Route::post('/', [OwnerController::class, 'store']);
    Route::get('/{id}', [OwnerController::class, 'show']);
    Route::put('/{id}', [OwnerController::class, 'update']);
});

// Device routes
Route::prefix('devices')->group(function () {
    Route::get('/', [DeviceController::class, 'index']);
    Route::post('/', [DeviceController::class, 'store']);
    Route::get('/{id}', [DeviceController::class, 'show']);
    Route::put('/{id}', [DeviceController::class, 'update']);
    Route::get('/{id}/ticket', [DeviceTicketController::class, 'generateTicket']);
    Route::get('/{id}/received', [SMSController::class, 'sendReceivedMessage']);
    Route::get('/{id}/in-progress', [SMSController::class, 'sendInProgressMessage']);
    Route::get('/{id}/completed', [SMSController::class, 'sendCompletedMessage']);
    Route::delete('/{id}',  [DeviceController::class, 'destroy']);

});



// User routes
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Update routes
Route::prefix('updates')->group(function () {
   // Route::get('/', [UpdateController::class, 'index']);
    Route::post('/', [UpdateController::class, 'store']);
    Route::get('/{update}', [UpdateController::class, 'show']);
    Route::put('/{update}', [UpdateController::class, 'update']);
    Route::delete('/{update}', [UpdateController::class, 'destroy']);
});

Route::get('/catalog/owners', [CatalogController::class, 'ownersSelect']);
Route::get('/catalog/users', [CatalogController::class, 'UsersSelect']);

