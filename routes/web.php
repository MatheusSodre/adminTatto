<?php

use App\Http\Controllers\Admin\ACL\{PermissionController,PermissionProfileController,ProfileController};
use App\Http\Controllers\Admin\{PlanController,CompanyController};
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->middleware('auth')
        ->group(callback: function() {


        Route::get('plans/{uuid}',[PlanController::class,'index'])->name('plans.index');
        Route::get('plans',[PlanController::class,'index'])->name('plans.index');
        Route::post('plans',[PlanController::class,'store'])->name('plans.store');
        Route::get('product',[ProductController::class,'index'])->name('product.index');

        /**
         * Permissions X Profiles
        */
        Route::post('profiles/{id}/permissions/store', [PermissionProfileController::class,'attachPermissionProfile'])->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class,'detachPermissionProfile'])->name('profiles.permissions.detach');
        Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class,'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions',[PermissionProfileController::class,'permissions'])->name('profiles.permissions');
        Route::any('permissions/{id}/profile', [PermissionProfileController::class,'profiles'])->name('permissions.profile');

        /**
         * Profiles
         */
        Route::any('profiles/search', [ProfileController::class,'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

        /**
         * Permissions
        */
        Route::any('permissions/search', [PermissionController::class,'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);

        /**
         * Users
         */
        Route::any('users/search', [UserController::class,'search'])->name('users.search');
        Route::resource('users', UserController::class);

        /**
         * company
         */
        Route::get('company', [CompanyController::class,'index'])->name('company.index');

        /**
         * Home Dashboard
         */
        // Route::get('/', 'DashboardController@home')->name('admin.index');
        Route::get('/', [UserController::class,'index'])->name('admin.index');

    });



Auth::routes();
