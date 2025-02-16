<?php

use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/single', [BlogController::class, 'singleblog'])->name('single');
Route::get('/category', [BlogController::class, 'category'])->name('category');
