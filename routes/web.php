<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customerview');
        Route::get('/create', [CustomerController::class, 'create']);
        Route::post('/customer/save', [CustomerController::class, 'store'])->name('customer.save');
        Route::delete('/delete/{customer}', [CustomerController::class, 'destroy']);
        Route::get('/edit/{customer}', [CustomerController::class, 'edit']);
        Route::put('/customer/update/{customer}', [CustomerController::class, 'update']);
        Route::get('/{customer}', [CustomerController::class, 'show']);

    });


    Route::prefix('food')->group(function () {
        Route::get('/', [FoodController::class, 'index'])->name('foodview');
        Route::get('/create', [FoodController::class, 'create']);
        Route::post('/create/save', [FoodController::class, 'store']);
        Route::delete('/delete/{food}', [FoodController::class, 'destroy']);
        Route::get('/{food}/edit', [FoodController::class, 'edit']);
        Route::put('/update/{food}', [FoodController::class, 'update']);
    });
});





