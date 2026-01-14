<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::post('/admin/login', function () {
    // For now, just redirect to dashboard
    // In production, add proper authentication logic here
    return redirect()->route('admin.dashboard');
})->name('admin.login');
