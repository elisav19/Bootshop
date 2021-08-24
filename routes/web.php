<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/basket', [BasketController::class, 'index'])->name('basket');
Route::post('/basket/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
Route::post('/basket/remove/{id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/basket/checkout', [BasketController::class, 'checkoutConfirm'])->name('checkout-confirm');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');

Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product');
Route::get('/catalog/', [ProductController::class, 'catalog'])->name('catalog');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
