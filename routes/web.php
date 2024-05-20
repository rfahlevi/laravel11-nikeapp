<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    return view('pages.auth.login');
});


Route::middleware('auth')->group(function() {
    Route::get('home', [DashboardController::class, 'index'])
            ->name('home');

     Route::resource('users', UserController::class)
        ->except(['show'])
        ->parameters(['users' => 'slug']);
    
    Route::resource('product-category', ProductCategoryController::class)
        ->except(['show'])
        ->names('productCategory')
        ->parameters(['product-category' => 'slug']);

    Route::get('products/{product:slug}', [ProductController::class, 'show'])
        ->name('products.show');
});