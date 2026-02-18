<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SensorController;

// Jalur untuk Dashboard (Browser)
Route::get('/get-sensor', [SensorController::class, 'latest']);

// Jalur untuk Arduino (ESP32)
Route::post('/update-sensor', [SensorController::class, 'store']);