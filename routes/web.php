<?php

use Illuminate\Support\Facades\Route;



// CRUD for main model Movie
Route::get('/', [App\Http\Controllers\MovieController::class, 'index'])->name('movie.index');
Route::get('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'show'])->name('movie.show');

Route::get('/movies/create', [App\Http\Controllers\MovieController::class, 'create'])->name('movie.create');
Route::post('/', [App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');

Route::get('/movies/{movie}/edit', [App\Http\Controllers\MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'update'])->name('movie.update');

Route::delete('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('movie.destroy');



// CRUD for model Type
Route::get('/types', [App\Http\Controllers\TypeController::class, 'index'])->name('type.index');

Route::get('/types/create', [App\Http\Controllers\TypeController::class, 'create'])->name('type.create');
Route::post('/types', [App\Http\Controllers\TypeController::class, 'store'])->name('type.store');

Route::get('/types/{type}/edit', [App\Http\Controllers\TypeController::class, 'edit'])->name('type.edit');
Route::put('/types/{type}', [App\Http\Controllers\TypeController::class, 'update'])->name('type.update');

Route::delete('/types/{type}', [App\Http\Controllers\TypeController::class, 'destroy'])->name('type.destroy');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
