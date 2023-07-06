<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\Admin\AdminController;
use App\Http\Controllers\Main\Admin\Group\AdminGroupController;
use App\Http\Controllers\Main\Admin\Group\Curator\AdminCuratorGroupController;
use App\Http\Controllers\Main\Admin\Group\Specialization\AdminGroupSpecializationController;
use App\Http\Controllers\Main\Admin\Item\AdminItemController;
use App\Http\Controllers\Main\Admin\Role\RoleController;
use App\Http\Controllers\Main\Admin\Specialization\AdminSpecializationController;
use App\Http\Controllers\Main\Admin\User\AdminUserController;
use App\Http\Controllers\Main\Admin\User\GroupUser\AdminGroupUserController;
use App\Http\Controllers\Main\Admin\User\Password\AdminPasswordUserController;
use App\Http\Controllers\Main\Admin\User\Role\AdminUserRoleController;
use App\Http\Controllers\Main\Admin\User\Trash\AdminUserTrashController;
use App\Http\Controllers\Main\Claim\ClaimController;
use App\Http\Controllers\Main\Curator\CuratorController;
use App\Http\Controllers\Main\Curator\Profile\CuratorProfileController;
use App\Http\Controllers\Main\Education\EducationController;
use App\Http\Controllers\Main\Education\Reference\ReferenceController;
use App\Http\Controllers\Main\Education\Worker\WorkerController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\Profile\ProfileController;
use App\Http\Controllers\Main\Truancy\TruancyController;
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

// TODO: Using Policy for view fields
//Route::get('/home', [MainController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');

Route::group(['namespace' => 'Main', 'prefix' => 'main', 'middleware' => 'auth'], function () {

    Route::get('/', [IndexController::class, 'index'])->name('main.index');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
            Route::post('/', [AdminUserController::class, 'store'])->name('admin.user.store');
            Route::get('/user/{user}', [AdminUserController::class, 'show'])->name('admin.user.show');
            Route::get('/user/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
            Route::patch('/user/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');
            Route::delete('/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
            Route::get('/search', [AdminUserController::class, 'search'])->name('admin.user.search');

            Route::group(['namespace' => 'Password', 'prefix' => 'user/{user}/password'], function () {
                Route::get('/edit', [AdminPasswordUserController::class, 'edit'])->name('admin.user.password.edit');
                Route::patch('/', [AdminPasswordUserController::class, 'update'])->name('admin.user.password.update');
            });

            Route::group(['namespace' => 'Role', 'prefix' => 'user/{user}/role'], function () {
                Route::get('/edit', [AdminUserRoleController::class, 'edit'])->name('admin.user.role.edit');
                Route::patch('/', [AdminUserRoleController::class, 'update'])->name('admin.user.role.update');
            });

            Route::group(['namespace' => 'Trash', 'prefix' => 'trashes'], function () {
                Route::get('/', [AdminUserTrashController::class, 'index'])->name('admin.user.trash.index');
                Route::post('/{id}/restore', [AdminUserTrashController::class, 'restore'])->name('admin.user.trash.restore');
                Route::post('/{id}/force', [AdminUserTrashController::class, 'force'])->name('admin.user.trash.force');
            });

            Route::group(['namespace' => 'GroupUser', 'prefix' => '{user}/group'], function () {
                Route::post('/', [AdminGroupUserController::class, 'store'])->name('admin.user.group.store');
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

        Route::group(['namespace' => 'Group', 'prefix' => 'groups'], function () {
            Route::get('/', [AdminGroupController::class, 'index'])->name('admin.group.index');
            Route::get('/create', [AdminGroupController::class, 'create'])->name('admin.group.create');
            Route::post('/', [AdminGroupController::class, 'store'])->name('admin.group.store');
            Route::get('/group/{group}', [AdminGroupController::class, 'show'])->name('admin.group.show');
            Route::get('/group/{group}/edit', [AdminGroupController::class, 'edit'])->name('admin.group.edit');
            Route::patch('/group/{group}', [AdminGroupController::class, 'update'])->name('admin.group.update');
            Route::delete('/group/{group}', [AdminGroupController::class, 'destroy'])->name('admin.group.destroy');

            Route::group(['namespace' => 'Specialization', 'prefix' => '{group}/specialization'], function () {
                Route::post('/', [AdminGroupSpecializationController::class, 'store'])->name('admin.user.specialization.store');
            });

            Route::group(['namespace' => 'Curator', 'prefix' => '{group}/curator'], function () {
                Route::post('/', [AdminCuratorGroupController::class, 'store'])->name('admin.user.curator.store');
            });
        });

        Route::group(['namespace' => 'Item', 'prefix' => 'items'], function () {
            Route::get('/', [AdminItemController::class, 'index'])->name('admin.item.index');
            Route::get('/create', [AdminItemController::class, 'create'])->name('admin.item.create');
            Route::post('/', [AdminItemController::class, 'store'])->name('admin.item.store');
            Route::get('/item/{item}', [AdminItemController::class, 'show'])->name('admin.item.show');
            Route::get('/item/{item}/edit', [AdminItemController::class, 'edit'])->name('admin.item.edit');
            Route::patch('/item/{item}', [AdminItemController::class, 'update'])->name('admin.item.update');
            Route::delete('/item/{item}', [AdminItemController::class, 'destroy'])->name('admin.item.destroy');
        });

        Route::group(['namespace' => 'Specialization', 'prefix' => 'specializations'], function () {
            Route::get('/', [AdminSpecializationController::class, 'index'])->name('admin.specialization.index');
            Route::get('/create', [AdminSpecializationController::class, 'create'])->name('admin.specialization.create');
            Route::post('/', [AdminSpecializationController::class, 'store'])->name('admin.specialization.store');
            Route::get('/specialization/{specialization}', [AdminSpecializationController::class, 'show'])->name('admin.specialization.show');
            Route::get('/specialization/{specialization}/edit', [AdminSpecializationController::class, 'edit'])->name('admin.specialization.edit');
            Route::patch('/specialization/{specialization}', [AdminSpecializationController::class, 'update'])->name('admin.specialization.update');
            Route::delete('/specialization/{specialization}', [AdminSpecializationController::class, 'destroy'])->name('admin.specialization.destroy');
        });
    });

    Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/password', [ProfileController::class, 'password'])->name('profile.password');
    });

    Route::group(['namespace' => 'Curator', 'prefix' => 'curator', 'middleware' => 'curator'], function () {
        Route::get('/', [CuratorController::class, 'index'])->name('curator.index');
        Route::get('/student/{user}', [CuratorController::class, 'show'])->name('curator.show');
        Route::delete('/student/{user}', [CuratorController::class, 'destroy'])->name('curator.destroy');

        Route::group(['namespace' => 'Profile', 'prefix' => 'profile'], function () {
            Route::get('/', [CuratorProfileController::class, 'index'])->name('curator.profile.index');
        });
    });

    Route::group(['namespace' => 'Claim', 'prefix' => 'claim'], function () {
        Route::get('/', [ClaimController::class, 'index'])->name('claim.index');
        Route::get('/user/{user}', [ClaimController::class, 'show'])->name('claim.show');
        Route::post('/', [ClaimController::class, 'store'])->name('claim.store');
        Route::get('/search', [ClaimController::class, 'search'])->name('claim.search');
        Route::get('/my-report', [ClaimController::class, 'report'])->name('claim.report');
    });

    Route::group(['namespace' => 'Truancies', 'prefix' => 'truancy'], function () {
        Route::get('/', [TruancyController::class, 'index'])->name('truancy.index');
        Route::post('/', [TruancyController::class, 'store'])->name('truancy.store');
    });

    Route::group(['namespace' => 'Education', 'prefix' => 'education'], function () {

        Route::group(['namespace' => 'Worker', 'prefix' => 'worker'], function () {
            Route::get('/', [WorkerController::class, 'index'])->name('worker.index');
        });

        Route::group(['namespace' => 'Reference', 'prefix' => 'reference'], function () {
            Route::get('/', [ReferenceController::class, 'index'])->name('reference.index');
        });
    });
});


Auth::routes();
