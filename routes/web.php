<?php

use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'is.admin'], function () {
        Route::get('/admin/orders', [OrdersController::class, 'index'])->name('orders');
    });
});

Route::get('/', [MainController::class, 'index'])->name('home');

Route::group(['prefix' => 'basket'], function () {
    Route::get('/', [BasketController::class, 'index'])->name('basket');
    Route::post('/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
    Route::post('/remove/{id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
    Route::post('/checkout', [BasketController::class, 'checkoutConfirm'])->name('checkout-confirm');
});

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');

Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product');
Route::get('/catalog/', [ProductController::class, 'catalog'])->name('catalog');
