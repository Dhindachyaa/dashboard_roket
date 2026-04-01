<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;

/*
|--------------------------------------------------------------------------
| Web Routes - Project ROKET 
|--------------------------------------------------------------------------
*/

// Halaman Utama Web
Route::get('/', [SensorController::class, 'index']);
Route::get('/dashboard', [SensorController::class, 'index'])->name('dashboard');

// Kumpulan API untuk JavaScript (Real-Time Data)
Route::get('/api/get-sensor', [SensorController::class, 'getApiData']);
Route::get('/api/get-history', [SensorController::class, 'getHistoryData']);
Route::get('/api/get-peak-time', [SensorController::class, 'getPeakTimeData']);
Route::get('/api/get-prediction', [SensorController::class, 'getPredictionData']);

// Route Halaman Menu Sidebar
Route::get('/analytics', function () { return view('analytics'); })->name('analytics');
Route::get('/devices', function () { return view('devices'); })->name('devices');
Route::get('/reports', function () { return view('reports'); })->name('reports');
Route::get('/settings', function () { return view('settings'); })->name('settings');
Route::get('/chatbot', function () { return view('chatbot'); })->name('chatbot');

// Route Halaman Tambahan
Route::get('/roket', function () { return view('roket'); });
Route::get('/kalikesek', function () { return view('kalikesek'); });
Route::get('/review', function () { return view('review'); });