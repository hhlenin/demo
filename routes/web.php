<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutControl;

Route::get('/', [EcommerceController::class, 'index'])->name('home');
Route::get('product-category/{id}', [EcommerceController::class, 'categoryProduct'])->name('product-category');
Route::get('product-sub-category/{id}', [EcommerceController::class, 'subCategoryProduct'])->name('product-sub-category');
Route::get('product-detail-info/{id}', [EcommerceController::class, 'productDetail'])->name('product-detail');
Route::post('add-to-cart/{id}', [CartController::class, 'index'])->name('add-to-cart');
Route::get('show-cart-product', [CartController::class, 'show'])->name('show-cart');
Route::post('update-cart-product/{id}', [CartController::class, 'update'])->name('update-cart-product');
Route::get('delete-cart-product/{id}', [CartController::class, 'delete'])->name('delete-cart-product');

Route::get('checkouts', [CheckOutControl::class, 'index'])->name('checkouts');
Route::post('new-order', [CheckOutControl::class, 'newOrder'])->name('new-order');
Route::get('complete-order', [CheckOutControl::class, 'completeOrder'])->name('complete-order');


