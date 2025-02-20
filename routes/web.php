<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('index');

Route::get('/single', [BlogController::class, 'singleblog'])->name('single');
Route::get('/category', [BlogController::class, 'category'])->name('category');



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');

    Route::get('/addblog', [BlogController::class, 'addblog'])
        ->name('addblog');

    Route::get('/allblogs', [BlogController::class, 'allblogs'])
        ->name('allblogs');

    Route::post('/addblog', [BlogController::class, 'createBlog'])
        ->name('creteblog');

    Route::post('/deleteblog/{id}', [BlogController::class, 'deleteBlog'])
        ->name('deleteblog');

    Route::get('/editblog/{id}', [BlogController::class, 'editblog'])->name('editblog');

    Route::get('/generateblog', [BlogController::class, 'showGeneratePage'])->name('generateblog');



    Route::post('/updateblog/{id}', [BlogController::class, 'updateBlog'])->name('updateblog');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
