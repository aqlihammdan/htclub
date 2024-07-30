<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\WorkshopuserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Users route list
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [ReportController::class, 'index'])->name('home');
    Route::get('/workshop', [WorkshopuserController::class, 'index'])->name('workshop');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::resource('reports', ReportController::class);
    Route::resource('comments', CommentController::class);
    Route::get('/like/{id}', [LikeController::class, 'index']);
});

// Admins route list
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [CategoryController::class, 'index'])->name('admin.home');
    Route::get('/admin/workshop', [WorkshopController::class, 'index'])->name('admin.workshop');
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.user');
    Route::prefix('admin')->group(function () {
        Route::delete('home/delete/{id}', [CategoryController::class, 'destroy']);
        Route::delete('workshop/delete/{id}', [WorkshopController::class, 'destroy']);
        Route::delete('users/delete/{id}', [UsersController::class, 'destroy']);
    });
    Route::resource('users', UsersController::class);
    Route::resource('workshops', WorkshopController::class);
    Route::resource('categories', CategoryController::class);
});
