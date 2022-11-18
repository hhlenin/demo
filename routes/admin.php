<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\AdminOrderController;

Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('carousel', CarouselController::class)->only(['destroy', 'index', 'store', 'update', 'edit']);

        Route::group(['prefix' => 'category', 'as' => 'category.'], function(){
            Route::get('add', [CategoryController::class, 'index'])->name('add');
            Route::post('new', [CategoryController::class, 'create'])->name('new');
            Route::get('manage', [CategoryController::class, 'manage'])->name('manage');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix' => 'sub-category', 'as' => 'sub-category.'], function(){
            Route::get('add', [SubCategoryController::class, 'index'])->name('add');
            Route::post('new', [SubCategoryController::class, 'create'])->name('create');
            Route::get('manage', [SubCategoryController::class, 'manage'])->name('manage');
            Route::get('edit/{id}', [SubCategoryController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [SubCategoryController::class, 'update'])->name('update');
            Route::post('delete/{id}', [SubCategoryController::class, 'delete'])->name('delete');
        });

        Route::resource('brand', BrandController::class);

        Route::resource('unit', UnitController::class);

        Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
            Route::get('add', [ProductController::class, 'index'])->name('add');
            Route::get('get-sub-category-by-category-id', [ProductController::class, 'getSubCategory'])->name('product.sub-category');
            Route::post('new', [ProductController::class, 'create'])->name('new');
            Route::get('manage', [ProductController::class, 'manage'])->name('manage');
            Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
        });
    });








    

    Route::get('/admin-order-manage', [AdminOrderController::class, 'index'])->name('admin.order-manage');
    Route::get('/admin-order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin-order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin-order-invoice-download/{id}', [AdminOrderController::class, 'downloadInvoice'])->name('admin.invoice-download');
    Route::get('/admin-order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('/admin-order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
    Route::get('/admin-order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');

});
