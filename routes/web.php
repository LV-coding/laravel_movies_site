<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Movie;


Route::get('/', App\Http\Controllers\IndexController::class)->name('index');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/movies/create', App\Http\Controllers\Movie\CreateController::class)->name('movie.create');
    Route::post('/movies', App\Http\Controllers\Movie\StoreController::class)->name('movie.store');

    Route::get('/movies/{movie}/edit', App\Http\Controllers\Movie\EditController::class)->name('movie.edit');
    Route::put('/movies/{movie}', App\Http\Controllers\Movie\UpdateController::class)->name('movie.update');

    Route::delete('/movies/{movie}', App\Http\Controllers\Movie\DestroyController::class)->name('movie.destroy');


    // CRUD for model Type
    Route::get('/types', [App\Http\Controllers\TypeController::class, 'index'])->name('type.index');

    Route::get('/types/create', [App\Http\Controllers\TypeController::class, 'create'])->name('type.create');
    Route::post('/types', [App\Http\Controllers\TypeController::class, 'store'])->name('type.store');

    Route::get('/types/{type}/edit', [App\Http\Controllers\TypeController::class, 'edit'])->name('type.edit');
    Route::put('/types/{type}', [App\Http\Controllers\TypeController::class, 'update'])->name('type.update');

    Route::delete('/types/{type}', [App\Http\Controllers\TypeController::class, 'destroy'])->name('type.destroy');


    // CRUD for model Tag
    Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tag.index');

    Route::get('/tags/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
    Route::post('/tags', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');

    Route::get('/tags/{tag}/edit', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
    Route::put('/tags/{tag}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');

    Route::delete('/tags/{tag}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
});


Route::get('/movies', App\Http\Controllers\Movie\IndexController::class)->name('movie.index');
Route::get('/movies/{movie}', App\Http\Controllers\Movie\ShowController::class)->name('movie.show');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
