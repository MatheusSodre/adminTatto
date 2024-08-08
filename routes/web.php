<?php

use App\Http\Controllers\Admin\ACL\{PermissionController,PermissionProfileController,ProfileController};
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
     ->group(callback: function() {


        Route::get('plans/{uuid}',[PlanController::class,'index'])->name('plans.index');
        Route::get('plans',[PlanController::class,'index'])->name('plans.index');
        Route::post('plans',[PlanController::class,'store'])->name('plans.store');
        Route::get('product',[ProductController::class,'index'])->name('product.index');

             /**
              * Permicions X Profiles
              */
        Route::post('roles/{id}/permissions/store', [PermissionProfileController::class,'attachPermissionProfile'])->name('profiles.permissions.attach');
        Route::get('roles/{id}/permissions/create', [PermissionProfileController::class,'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions',[PermissionProfileController::class,'permissions'])->name('profiles.permissions');
            /**
             * Profiles
             */
        Route::any('profiles/search', [ProfileController::class,'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);
             /**
              * permissions
              */
        Route::any('permissions/search', [PermissionController::class,'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);



            /**
             * Home Dashboard
             */
            Route::get('/', 'DashboardController@home')->name('admin.index');

    });



// Route::get('/', function () {
//     return view('welcome');
// });


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Auth::routes();
//
