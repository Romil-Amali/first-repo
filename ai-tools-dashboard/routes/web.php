<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AiToolController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/tools', [AiToolController::class, 'index'])->name('tools.index');
Route::get('/tools/{slug}', [AiToolController::class, 'show'])->name('tools.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
