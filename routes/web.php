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

Route::get('/user/product/delete/{id}', [App\Http\Controllers\UserDashboardController::class, 'productDelete'])->name('userProd.delete');

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

Route::get('/admin/categories/all', [\App\Http\Controllers\AdminController::class, 'allCategories'])->name('category.all');

Route::get('/admin/categories/add', [\App\Http\Controllers\AdminController::class, 'addCategory'])->name('category.add');

Route::post('/admin/categories/store', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('category.store');

Route::get('/admin/categories/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('category.delete');

Route::get('/admin/categories/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editCategory'])->name('category.edit');

Route::post('/admin/categories/update/{id}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('category.update');

Route::get('/buy/now/{id}', [\App\Http\Controllers\HomeController::class, 'buyNow'])->name('buy.now')->middleware('auth');

Route::post('/payment/success/{id}', [\App\Http\Controllers\HomeController::class, 'paymentSuccess'])->name('payment.success')->middleware('auth');

Route::get('/order/history', [\App\Http\Controllers\HomeController::class, 'orderHistory'])->name('order.histry')->middleware('auth');

Route::get('/order/history', [\App\Http\Controllers\HomeController::class, 'orderHistory'])->name('order.histry')->middleware('auth');

Route::get('/invoice/download/{id}', [\App\Http\Controllers\HomeController::class, 'downloadInvoice'])->name('download.invoice')->middleware('auth');

Route::get('/admin/request/delivery', [\App\Http\Controllers\AdminController::class, 'requestDelivery'])->name('request.delivery');

Route::get('/admin/contact/seller/{id}', [\App\Http\Controllers\AdminController::class, 'contactedSeller'])->name('contacted.seller');

Route::get('/admin/product/refund/{id}', [\App\Http\Controllers\AdminController::class, 'productRefund'])->name('product.refund');

Route::get('/admin/inventory', [\App\Http\Controllers\AdminController::class, 'adminInventory'])->name('admin.inventory');

Route::post('/add/inventory', [\App\Http\Controllers\AdminController::class, 'addInventory'])->name('inventory.add');

Route::get('/product/delivered/{id}', [\App\Http\Controllers\AdminController::class, 'productDelivered'])->name('product.delivered');
