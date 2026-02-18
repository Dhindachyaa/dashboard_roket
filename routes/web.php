<?php

use Illuminate\Support\Facades\Route;

// Halaman utama (root) langsung diarahkan ke dashboard
Route::get('/', function () {
    return view('dashboard');
});

// Route spesifik untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route sementara untuk halaman lain agar tidak error saat diklik
Route::get('/analytics', function () { return "Halaman Analytics AI (SVM & Decision Tree)"; });
Route::get('/devices', function () { return "Halaman Manajemen Device IoT"; });
Route::get('/reports', function () { return "Halaman Laporan Data"; });
Route::get('/settings', function () { return "Halaman Pengaturan"; });
Route::get('/kalikesek', function () {return view('kalikesek'); });
Route::get('/roket', function () {return view('roket'); });
Route::get('/review', function () {return view('review'); });
Route::get('/analytics', function () { return view('analytics'); });
Route::get('/devices', function () { return view('devices'); });
Route::get('/reports', function () { return view('reports'); });
Route::get('/settings', function () { return view('settings'); });
Route::get('/chatbot', function () {return view('chatbot');});
