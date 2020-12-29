<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::resource('products', ProductController::class);
Route::resource('transaction', TransactionController::class);
Route::resource('product-categories', ProductCategoryController::class);

Route::get('cart/{id}', [TransactionController::class, 'cart'])->name('cart');
Route::put('cart/{id}', [TransactionController::class, 'countPrice'])->name('count-price');
Route::get('total', function(){
    return view('transaction.total');
})->name('total');

