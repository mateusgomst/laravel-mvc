<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('vehicles')->group(function () {
    Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
    Route::get('/create', [VehicleController::class, 'create'])->name('vehicles.create');
    Route::post('/', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
    Route::get('/{id}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
    Route::put('/{user}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
});