<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

// Guest routes
Route::get('/', [LandingPageController::class, 'index'])->name('welcome');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});