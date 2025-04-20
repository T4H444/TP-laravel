<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Front-office
Route::view('/', 'home');
Route::prefix('articles')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('getAllArticles');
    Route::get('/{id}', [BlogController::class, 'show'])->name('getArticleById');
    Route::get('/articles/category/{category}', [ArticleController::class, 'getArticlesByCategory'])->name('articles.filtredArticles');

});
Route::get('/about', [BlogController::class, 'about'])->name('about-page');

// Back-office
Route::prefix('admin')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('getAllArticles-ByAdmin');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('getAllArticleById-ByAdmin');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('getArticleEdit-ByAdmin');

});

// Page not-Found
Route::fallback(function () {
    return view('not-found');
});
