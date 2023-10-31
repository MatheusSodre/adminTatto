<?php

use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/admin/plans/{uuid}',[PlanController::class,'index'])->name('plans.index');
Route::get('/admin/plans',[PlanController::class,'index'])->name('plans.index');

Route::post('/admin/plans',[PlanController::class,'store'])->name('plans.store');


Route::get('/admin/product',[ProductController::class,'index'])->name('product.index');

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

