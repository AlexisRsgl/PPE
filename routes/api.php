<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\VendorController;

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

Route::post('/inscription', [UserController::class, "inscription"]);
Route::post('/connexion', [UserController::class, "connexion"]);

Route::get('/agencies', [AgencyController::class, "index"]);
Route::post('/agencies', [AgencyController::class, "store"]);

Route::get('/vendors', [VendorController::class, "index"]);
Route::post('/vendors', [VendorController::class, "store"]);

Route::get('/cars', [CarsController::class, "index"]);
Route::post('/cars', [CarsController::class, "store"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
