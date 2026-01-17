<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;

// Public routes
Route::get('/', function () {
    return view('index');
});

Route::post('/admin/login', function () {
    // For now, just redirect to dashboard
    // In production, add proper authentication logic here
    return redirect()->route('admin.dashboard');
})->name('admin.login');

// Admin view routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory');
Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers');
Route::get('/admin/customers/{id}', [CustomerController::class, 'show'])->name('admin.customer.details');
Route::get('/admin/reports', [ReportsController::class, 'index'])->name('admin.reports');
Route::get('/admin/technicians', [TechnicianController::class, 'index'])->name('admin.technicians');
Route::get('/admin/technicians/{id}', [TechnicianController::class, 'show'])->name('admin.technician.details');
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');

// Booking API routes
Route::prefix('api/bookings')->group(function () {
    Route::get('/stats', [BookingController::class, 'getStats']); // Get booking statistics
    Route::post('/', [BookingController::class, 'store']); // Create booking
    Route::get('/pending', [BookingController::class, 'getPendingBookings']); // Get pending bookings
    Route::get('/completed', [BookingController::class, 'getCompletedBookings']); // Get completed bookings
    Route::get('/cancelled', [BookingController::class, 'getCancelledBookings']); // Get cancelled bookings
    Route::get('/{id}', [BookingController::class, 'show']); // Get booking details
    Route::post('/{id}/assign', [BookingController::class, 'assignTechnician']); // Assign technician
    Route::post('/{id}/complete', [BookingController::class, 'complete']); // Complete booking
    Route::post('/{id}/cancel', [BookingController::class, 'cancelBooking']); // Cancel booking
    Route::get('/{id}/parts', [BookingController::class, 'getAvailableParts']); // Get available parts
});

// Technician API routes
Route::prefix('api/technicians')->group(function () {
    Route::get('/', [TechnicianController::class, 'getAvailable']); // Get available technicians
    Route::get('/stats', [TechnicianController::class, 'getStats']); // Get technician statistics
    Route::get('/{id}', [TechnicianController::class, 'show']); // Get technician details
    Route::post('/', [TechnicianController::class, 'store']); // Add new technician
    Route::put('/{id}', [TechnicianController::class, 'update']); // Update technician
    Route::delete('/{id}', [TechnicianController::class, 'destroy']); // Delete technician
});

// Inventory API routes
Route::prefix('api/inventory')->group(function () {
    Route::get('/', [InventoryController::class, 'getInventory']); // Get inventory with filters
    Route::get('/stats', [InventoryController::class, 'getStats']); // Get inventory statistics
    Route::get('/low-stock', [InventoryController::class, 'getLowStock']); // Get low stock items
    Route::get('/out-of-stock', [InventoryController::class, 'getOutOfStock']); // Get out of stock items
    Route::get('/{id}', [InventoryController::class, 'show']); // Get item details
    Route::get('/{id}/movements', [InventoryController::class, 'getStockMovements']); // Get stock movements
    Route::post('/', [InventoryController::class, 'store']); // Add new item
    Route::put('/{id}', [InventoryController::class, 'update']); // Update item
    Route::post('/{id}/add-stock', [InventoryController::class, 'addStock']); // Add stock
    Route::post('/{id}/remove-stock', [InventoryController::class, 'removeStock']); // Remove stock
    Route::delete('/{id}', [InventoryController::class, 'destroy']); // Delete item
});

// Customer API routes
Route::prefix('api/customers')->group(function () {
    Route::get('/', [CustomerController::class, 'getCustomers']); // Get customers with filters
    Route::get('/stats', [CustomerController::class, 'getStats']); // Get customer statistics
    Route::get('/top', [CustomerController::class, 'getTopCustomers']); // Get top customers
    Route::get('/{id}', [CustomerController::class, 'show']); // Get customer profile
    Route::put('/{id}', [CustomerController::class, 'update']); // Update customer
});

// Reports API routes
Route::prefix('api/reports')->group(function () {
    Route::get('/revenue', [ReportsController::class, 'getRevenueAnalytics']); // Revenue analytics
    Route::get('/services', [ReportsController::class, 'getServiceAnalytics']); // Service analytics
    Route::get('/appliances', [ReportsController::class, 'getApplianceAnalytics']); // Appliance analytics
    Route::get('/technicians', [ReportsController::class, 'getTechnicianPerformance']); // Technician performance
    Route::get('/inventory', [ReportsController::class, 'getInventoryAnalytics']); // Inventory usage
    Route::get('/customers', [ReportsController::class, 'getCustomerAnalytics']); // Customer analytics
    Route::get('/overall', [ReportsController::class, 'getOverallStats']); // Overall statistics
    Route::get('/date-range', [ReportsController::class, 'getDateRangeReport']); // Date range report
});

// Settings API routes
Route::prefix('api/settings')->group(function () {
    Route::get('/labor-costs', [SettingsController::class, 'getLaborCosts']); // Get labor costs
    Route::get('/labor-costs/{serviceType}', [SettingsController::class, 'getServiceTypeCost']); // Get specific cost
    Route::put('/labor-costs/{id}', [SettingsController::class, 'updateLaborCost']); // Update labor cost
    Route::get('/price-history', [SettingsController::class, 'getPriceHistory']); // Get price history
});
