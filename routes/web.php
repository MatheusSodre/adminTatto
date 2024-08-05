<?php

use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
     ->group(function() {


            Route::get('plans/{uuid}',[PlanController::class,'index'])->name('plans.index');
            Route::get('plans',[PlanController::class,'index'])->name('plans.index');
            Route::post('plans',[PlanController::class,'store'])->name('plans.store');
            Route::get('product',[ProductController::class,'index'])->name('product.index');

            /**
             * Profiles
             */
            Route::any('profiles/search', [ProfileController::class,'search'])->name('profiles.search');
            Route::resource('profiles', ProfileController::class);


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
