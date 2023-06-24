<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::get('/add', [ItemController::class, 'create'])->name('items.create');
    Route::post('/add', [ItemController::class, 'store'])->name('items.store');
    Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
    Route::get('/admin/{user}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{user}', [UserController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('admin.destroy');
});
