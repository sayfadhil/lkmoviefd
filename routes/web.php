<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::get('/', [MovieController::class, 'index']);  // Mengarahkan root ke halaman index movies
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');

Route::resource('movies', MovieController::class)->only(['index', 'create', 'store','update' ,'destroy']);
Route::resource('genres', GenreController::class)->only(['index', 'create', 'store']);