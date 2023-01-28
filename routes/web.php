<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\MovieController::class, 'index'])->name('movie.index');
Route::get('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'show'])->name('movie.show');

Route::get('/movies/create', [App\Http\Controllers\MovieController::class, 'create'])->name('movie.create');
Route::post('/', [App\Http\Controllers\MovieController::class, 'store'])->name('movie.store');

Route::get('/movies/{movie}/edit', [App\Http\Controllers\MovieController::class, 'edit'])->name('movie.edit');
Route::put('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'update'])->name('movie.update');

Route::delete('/movies/{movie}', [App\Http\Controllers\MovieController::class, 'destroy'])->name('movie.destroy');



// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
