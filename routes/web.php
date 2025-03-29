<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehicleController::class, "listVehicles"])->name("vehicles.list");

Route::get("/vehicle/create", [VehicleController::class, "create"])->name("vehicles.create");
Route::get("/vehicle/edit/{id}", [VehicleController::class, "edit"])->name("vehicle.edit");
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
Route::post('/vehicle/{id}', [VehicleController::class, 'update'])->name('vehicle.update');
Route::delete("/vehicle/{id}", [VehicleController::class, "delete"])->name("vehicle.delete");

Auth::routes();

Route::get('/home', [VehicleController::class, 'index'])->name('home');
