<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;


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

//OWNER ROUTS

Route::get("owners", [OwnerController::class, 'index']);

Route::post("owner", [OwnerController::class, 'store']);

Route::get("owner/{$id}", [OwnerController::class, 'show']);
