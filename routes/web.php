<?php

use App\Http\Controllers\Admin\ACL\{PermissionController, PermissionProfileController, ProfileController};
use App\Http\Controllers\Admin\{PlanController, CompanyController, FilesController, FinancialController, FinancialExpensesController, LogsController, UserProfilesController};
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('auth')
    ->group(callback: function () {

        // Route::get('test', function (){
        //     dd(auth()->user()->hasPermissions('files'));
        // });

        Route::get('plans/{uuid}', [PlanController::class, 'index'])->name('plans.index');
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('product', [ProductController::class, 'index'])->name('product.index');

        /**
         * Permissions X Profiles
         */
        Route::post('profiles/{id}/permissions/store', [PermissionProfileController::class, 'attachPermissionProfile'])->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permissions.detach');
        Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::any('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profile');

        /**
         * Profiles
         */
        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

        /**
         * Files
         */
        Route::resource('files', FilesController::class);
        Route::any('files/search', [FilesController::class, 'search'])->name('files.search');
        Route::get('files/{file}/download', [FilesController::class, 'download'])->name('files.download');
        Route::get('files/{user}/user', [FilesController::class, 'getFileUser'])->name('files.getFileUser');

        /**
         * Financeiro
         */
        Route::get('financial', [FinancialController::class, 'index'])->name('financial.index');
        Route::get('financial/expenses', [FinancialExpensesController::class, 'index'])->name('financial.expenses.index');


        /**
         *  Attach Files Client
         */
        Route::any('files/{id}/attach', [FilesController::class, 'attachFileClient'])->name('attach.files.client');

        /**
         * Permissions
         */
        Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);

        /**
         * Users
         */
        Route::post('users/{user}/profiles/attach', [UserProfilesController::class, 'attachUserProfiles'])->name('users.profiles.attach');
        Route::any('users/{user}/profiles', [UserProfilesController::class, 'userProfiles'])->name('users.profiles');
        Route::put('users/{user}/status', [UserController::class, 'userStatus'])->name('users.status');
        Route::any('users/search', [UserController::class, 'search'])->name('users.search');
        Route::resource('users', UserController::class);

        /**
         * company
         */
        Route::get('company', [CompanyController::class, 'index'])->name('company.index');

        /**
         * logs
         */
        Route::get('logs', [LogsController::class, 'index'])->name('logs.index');

        /**
         * Home Dashboard
         */
        // Route::get('/', 'DashboardController@home')->name('admin.index');
        Route::get('/', [FilesController::class, 'index'])->name('admin.index');
        Route::get('/logout', [LoginController::class,'showLoginForm']);

    });
    Route::middleware(['auth', 'auth.session'])->group(function () {
            Route::get('/', [FilesController::class, 'index'])->name('admin.index');
    });
Auth::routes();
