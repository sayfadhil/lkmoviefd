<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('movies', MovieController::class)->only(['index', 'create', 'store']);
Route::resource('genres', GenreController::class)->only(['index', 'create', 'store']);
