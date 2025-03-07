<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\TourisAccommodationController;
use App\Http\Controllers\TourisClientController;
use App\Http\Controllers\TourISController;
use App\Http\Controllers\TourisFlightController;
use App\Http\Controllers\TourisPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/touris', [TourisController::class, 'index'])->name('touris.index');

Route::get('/accommodations', [TourisAccommodationController::class, 'index'])->name('accommodations.index');
Route::post('/accommodations', [TourisAccommodationController::class, 'store'])->name('accommodations.store');
Route::get('/accommodations/{id}/edit', [TourisAccommodationController::class, 'edit'])->name('accommodations.edit');
Route::put('/accommodations/{id}', [TourisAccommodationController::class, 'update'])->name('accommodations.update');
Route::delete('/accommodations/{id}', [TourisAccommodationController::class, 'destroy'])->name('accommodations.destroy');
Route::post('/accommodations/select', [TourisAccommodationController::class, 'selectAccommodation'])->name('accommodations.select');

Route::get('/clients', [TourisClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [TourisClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}/edit', [TourisClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [TourisClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [TourisClientController::class, 'destroy'])->name('clients.destroy');
Route::post('/clients/select', [TourisClientController::class, 'selectClient'])->name('clients.select');

Route::get('/flights', [TourisFlightController::class, 'index'])->name('flights.index');
Route::post('/flights', [TourisFlightController::class, 'store'])->name('flights.store');

Route::get('/payments', [TourisPaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [TourisPaymentController::class, 'store'])->name('payments.store');

Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');




