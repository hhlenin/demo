<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\Customer\ChattingCntroller;
use App\Http\Controllers\Customer\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ProductController;




Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('new-order', [CheckoutController::class, 'newOrder'])->name('new-order');
Route::get('complete-order', [CheckoutController::class, 'completeOrder'])->name('complete-order');

Route::group(['prefix' => 'customer/review', 'as' => 'customer.review.'], function(){
    Route::post('store', [ReviewController::class, 'store'])->name('store');
});

Route::group(['prefix' => 'customer', 'middleware' => 'customerLogout', 'as' => 'customer.'], function(){
    Route::get('login', [CustomerAuthController::class, 'login'])->name('login');
    Route::post('login-check', [CustomerAuthController::class, 'loginCheck'])->name('login-check');

    Route::get('register', [CustomerAuthController::class, 'register'])->name('register');
    Route::post('new', [CustomerAuthController::class, 'newCustomer'])->name('new');

});

Route::group(['prefix' => 'customer', 'middleware' => 'customer', 'as' => 'customer.'], function(){
    
    Route::post('logout', [CustomerAuthController::class, 'logout'])->name('logout');

    Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('add', [ProductController::class, 'index'])->name('add');
        Route::get('manage', [ProductController::class, 'manage'])->name('manage');

        Route::get('get-sub-category-by-category-id', [ProductController::class, 'getSubCategory'])->name('product.sub-category');
        Route::post('new', [ProductController::class, 'create'])->name('new');
        Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
    
    // Route::resource('chatting', ChattingCntroller::class);


    Route::group(['prefix' => 'chats', 'middleware' => 'customer', 'as' => 'chats.'], function(){
        Route::post('store', [ChatController::class, 'store'])->name('store');
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::get('get', [ChatController::class, 'get'])->name('get');
    });
    // Route::group(['prefix' => 'review', 'as' => 'review.'], function(){
    //     Route::post('store', [ReviewController::class, 'store'])->name('store');
    // });

});








