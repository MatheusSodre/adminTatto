<?php

use App\Http\Controllers\Api\Company\CategoryController;
use App\Http\Controllers\Api\Company\CompanyController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json(['message' => 'success']);
});

Route::apiResource('categories',CategoryController::class);

Route::apiResource('companies',CompanyController::class);

