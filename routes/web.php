<?php

use App\Http\Controllers\Admin\PlanController;
use Illuminate\Support\Facades\Route;



Route::get('/admin/plans/{uuid}',[PlanController::class,'index'])->name('plans.index');
Route::get('/admin/plans',[PlanController::class,'index'])->name('plans.index');
Route::post('/admin/plans',[PlanController::class,'store'])->name('plans.store');


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

