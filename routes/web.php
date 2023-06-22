<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\Admin\AdminController;
use App\Http\Controllers\Main\Admin\Role\RoleController;
use App\Http\Controllers\Main\Admin\User\AdminUserController;
use App\Http\Controllers\Main\Admin\User\Password\AdminPasswordUserController;
use App\Http\Controllers\Main\Admin\User\Role\AdminUserRoleController;
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

            Route::group(['namespace' => 'Password', 'prefix' => 'user/{user}/password'], function () {
                Route::get('/edit', [AdminPasswordUserController::class, 'edit'])->name('admin.user.password.edit');
                Route::patch('/', [AdminPasswordUserController::class, 'update'])->name('admin.user.password.update');
            });

            Route::group(['namespace' => 'Role', 'prefix' => 'user/{user}/role'], function () {
                Route::get('/edit', [AdminUserRoleController::class, 'edit'])->name('admin.user.role.edit');
                Route::patch('/', [AdminUserRoleController::class, 'update'])->name('admin.user.role.update');
            });
        });

        Route::group(['namespace' => 'Role', 'prefix' => 'roles'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
            Route::post('/', [RoleController::class, 'store'])->name('admin.role.store');
            Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('admin.role.edit');
            Route::patch('/role/{role}', [RoleController::class, 'update'])->name('admin.role.update');
            Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('admin.role.destroy');
        });
    });
});


Auth::routes();
