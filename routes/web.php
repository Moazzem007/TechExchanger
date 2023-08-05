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

Route::get('/user/dashboard', [\App\Http\Controllers\UserDashboardController::class, 'index'])->name('user.dashboard');

Route::get('/user/products', [\App\Http\Controllers\UserDashboardController::class, 'userProducts'])->name('user.products');

Route::get('/userProducts/edit/{id}', [\App\Http\Controllers\UserDashboardController::class, 'editUserProducts'])->name('userProducts.edit');

Route::post('/product/update/{id}', [App\Http\Controllers\UserDashboardController::class, 'productUpdate'])->name('product.update');

Route::get('/product/delete/{id}', [App\Http\Controllers\UserDashboardController::class, 'productDelete'])->name('userProducts.delete');

Route::post('profile/{id}',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update')->middleware('auth');

Route::get('/user/cart', [\App\Http\Controllers\UserDashboardController::class, 'userCart'])->name('user.cart');


Route::get('/user/add/{productId}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');

Route::get('/user/delete/{productId}', [\App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('cart.delete');

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

Route::post('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');

Route::get('/admin/users/all', [\App\Http\Controllers\AdminController::class, 'allUsers'])->name('user.all');

Route::get('/admin/users/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('user.edit');

Route::post('/admin/users/update/{id}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('user.update');

Route::get('/admin/products/all', [\App\Http\Controllers\AdminController::class, 'allProducts'])->name('products.all');


Route::get('/adminProducts/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editAdminProducts'])->name('adminProducts.edit');

Route::post('/product/update/{id}', [App\Http\Controllers\AdminController::class, 'productUpdate'])->name('adminProducts.update');

Route::get('/product/delete/{id}', [App\Http\Controllers\AdminController::class, 'productDelete'])->name('adminProducts.delete');
