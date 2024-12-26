<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProductController;

use App\Models\Product;


Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/tasks', [TaskController::class, 'index'])->name('admin.tasks');
    Route::get('admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('admin/tasks/{task}/edit', [TaskController::class, 'edit'])->name('admin.tasks.edit');
    Route::put('admin/tasks/{task}', [TaskController::class, 'update'])->name('admin.tasks.update');
    Route::delete('admin/tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});