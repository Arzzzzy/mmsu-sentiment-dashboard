<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatasetController;

// Public Routes
Route::get('/', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (Requires Login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/operating-units', function () {
        return Inertia::render('OperatingUnits');
    })->name('operating-units');

    Route::get('/add-csv', function () {
        return Inertia::render('AddCsv');
    })->name('add-csv');
    
    Route::post('/upload-csv', [DatasetController::class, 'store'])->name('upload.csv');
});