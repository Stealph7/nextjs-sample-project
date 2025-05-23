<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('parcels', ParcelController::class);
Route::apiResource('crops', CropController::class);
Route::apiResource('tasks', TaskController::class);
Route::apiResource('finances', FinanceController::class);
Route::apiResource('alerts', AlertController::class);
Route::apiResource('weather', WeatherController::class);
