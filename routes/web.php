<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('index');

Route::get('/single',[BlogController::class, 'singleblog'])->name('single');
Route::get('/category',[BlogController::class, 'category'])->name('category');



Route::middleware('auth')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard.dashboard');
        })->name('dashboard');

        Route::get('/addblog', [BlogController::class, 'addblog'])
            ->name('addblog');

            Route::get('/allblogs', [BlogController::class, 'allblogs'])
            ->name('allblogs');
        Route::post('/addblog', [BlogController::class, 'creteblog'])
        ->name('creteblog');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
