<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories/all', [App\Http\Controllers\HomeController::class, 'allCategories'])->name('categories.all');


Auth::routes();


Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create')->middleware('auth');

Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::get('/product/all', [App\Http\Controllers\ProductController::class, 'allProducts'])->name('product.all');

Route::get('/single/product/{id}', [App\Http\Controllers\ProductController::class, 'singleProduct'])->name('single.product');

Route::post('/search/all', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

