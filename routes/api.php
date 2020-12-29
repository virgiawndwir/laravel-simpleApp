<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCategoryController;

Route::apiResource('products', ProductController::class);
Route::apiResource('product-categories', ProductCategoryController::class);