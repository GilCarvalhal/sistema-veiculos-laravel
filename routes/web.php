<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehicleController::class, "listVehicles"])->name("vehicles.list");
Route::get("/vehicle/create", [VehicleController::class, "create"])->name("/vehicle.create");
Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
