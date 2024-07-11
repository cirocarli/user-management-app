<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\User\UserUsersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users/profile/{id}', [UserProfileController::class, 'index'])->name('profile.info');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','userMiddleware'])->group(function(){

    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('users', [UserUsersController::class, 'index'])->name('users');
    Route::get('/users/edit/{id}', [UserUsersController::class, 'edit'])->name('users.edit');
    Route::patch('/users/edit/{id}', [UserUsersController::class, 'update'])->name('users.update');

});

Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/edit/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/delete/{id}', [AdminUsersController::class, 'delete'])->name('admin.users.delete');

});