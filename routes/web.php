<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/operating-units', function () {
    return Inertia::render('OperatingUnits');
})->name('operating-units');

Route::get('/add-csv', function () {
    return Inertia::render('AddCsv');
})->name('add-csv');