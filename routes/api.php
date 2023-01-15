<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\OrdersController;

Route::post('/inscription', [UserController::class, "inscription"]);
Route::post('/connexion', [UserController::class, "connexion"]);

Route::get('/cars', [CarsController::class, "index"]);
Route::get('/cars/{id}', [CarsController::class, "show"]);

Route::get('/commandes', [OrdersController::class, "index"]);
Route::get('/commandes/{id}', [OrdersController::class, "show"]);

Route::group(["middleware" => ["auth:sanctum"]], function() {

    Route::post('/deconnexion', [UserController::class, "deconnexion"]);
    Route::post('/suppression', [UserController::class, "delete"]);

    Route::get('/agencies', [AgencyController::class, "index"]);
    Route::post('/agencies', [AgencyController::class, "store"]);
    Route::put('/agencies/{id}', [AgencyController::class, "update"]);
    Route::delete('/agencies/{id}', [AgencyController::class, "destroy"]);

    Route::get('/vendors', [VendorController::class, "index"]);
    Route::post('/vendors', [VendorController::class, "store"]);
    Route::put('/vendors/{id}', [VendorController::class, "update"]);
    Route::delete('/vendors/{id}', [VendorController::class, "destroy"]);

    Route::post('/cars', [CarsController::class, "store"]);
    Route::put('/cars/{id}', [CarsController::class, "update"]);
    Route::delete('/cars/{id}', [CarsController::class, "destroy"]);

    Route::post('/commandes', [OrdersController::class, "store"]);
    Route::put('/commandes/{id}', [OrdersController::class, "update"]);
    Route::delete('/commandes/{id}', [OrdersController::class, "destroy"]);
});
