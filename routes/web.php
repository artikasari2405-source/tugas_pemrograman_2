<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('', [CustomerController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customers.store');