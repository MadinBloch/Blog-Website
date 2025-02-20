<?php

use App\Http\Controllers\Frontend\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/generateblog', [BlogController::class, 'generateblogContent'])->name('generateblogContent');

