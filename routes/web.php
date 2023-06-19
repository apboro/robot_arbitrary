<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\Admin\AdminController;
use App\Http\Controllers\Main\Admin\User\AdminUserController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

// TODO: Add Middleware `auth`. After auth redirect to views
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('main.index');

    // TODO: Add Middleware `admin`.
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
            Route::post('/', [AdminUserController::class, 'store'])->name('admin.user.store');
            Route::get('/user/{user}', [AdminUserController::class, 'show'])->name('admin.user.show');
            Route::get('/user/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
            Route::patch('/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
            Route::delete('/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
        });
    });
});


Auth::routes();
