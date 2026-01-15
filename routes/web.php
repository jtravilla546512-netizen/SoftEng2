<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/inventory', function () {
    return view('admin.inventory');
})->name('admin.inventory');

Route::get('/admin/customers', function () {
    return view('admin.customers');
})->name('admin.customers');

Route::get('/admin/customers/{id}', function ($id) {
    return view('admin.customer-detail', ['customerId' => $id]);
})->name('admin.customer.details');

Route::get('/admin/reports', function () {
    return view('admin.reports');
})->name('admin.reports');

Route::post('/admin/login', function () {
    // For now, just redirect to dashboard
    // In production, add proper authentication logic here
    return redirect()->route('admin.dashboard');
})->name('admin.login');
