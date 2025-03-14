<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Controllers\HomeController;
use Modules\Blog\Controllers\ArticleController;
use Modules\Blog\Controllers\CategoryController;


// Authentication routes
Auth::routes();

// Dashboard (Admin Panel)
Route::middleware('auth')->group(function () {
    // Main Dashboard
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');

    // Articles Routes (Dashboard)
    Route::prefix('dashboard/articles')->name('articles.')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index'); // List all articles
        Route::get('/create', [ArticleController::class, 'create'])->name('create'); // Create form
        Route::post('/', [ArticleController::class, 'store'])->name('store'); // Store new article
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit'); // Edit form
        Route::put('/{article}', [ArticleController::class, 'update'])->name('update'); // Update article
        Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('destroy'); // Delete article
    });

    // Categories Routes (Dashboard)
    Route::prefix('dashboard/categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index'); // List all categories
        Route::get('/create', [CategoryController::class, 'create'])->name('create'); // Create form
        Route::post('/', [CategoryController::class, 'store'])->name('store'); // Store new category
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit'); // Edit form
        Route::put('/{category}', [CategoryController::class, 'update'])->name('update'); // Update category
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy'); // Delete category
    });
});

// Public Routes (For Visitors and Regular Users)
Route::get('/home', [HomeController::class, 'index'])->name('home'); // List all articles for public
Route::get('/home/{article}', [HomeController::class, 'show'])->name('articles.show'); // Show single article details
