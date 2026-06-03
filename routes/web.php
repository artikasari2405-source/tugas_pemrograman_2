<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('', [CustomerController::class, 'index']);

Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customers}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customers}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customers}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::resource('category',CategoryController::class);
Route::resource('product',ProductController::class);