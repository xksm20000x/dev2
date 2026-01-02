<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PostController,
    MainController
};

Route::get('/', [MainController::class, 'main'])->name('main');
Route::resource('posts', PostController::class);
