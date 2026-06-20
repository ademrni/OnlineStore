<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home.index');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])
    ->name('home.about');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])
    ->name('product.index');

Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])
    ->name('product.show');

Route::post('/cart/add/{id}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart.index');

Route::delete('/cart/delete', [CartController::class, 'delete'])
    ->name('cart.delete');

    Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase',
        [App\Http\Controllers\CartController::class,'purchase'])
        ->name('cart.purchase');
    Route::get('/my-account/orders',
        [App\Http\Controllers\MyAccountController::class,'orders'])
        ->name('myaccount.orders');
});

Route::middleware('admin')->group(function () {
Route::get('/admin', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])
    ->name('admin.home.index');

Route::get('/admin/products', [App\Http\Controllers\Admin\AdminProductController::class, 'index'])
    ->name('admin.product.index');

Route::post('/admin/products/store', [AdminProductController::class, 'store'])
    ->name('admin.product.store');

Route::delete(
    '/admin/products/{id}/delete',
    'App\Http\Controllers\Admin\AdminProductController@delete'
)->name('admin.product.delete');

Route::get(
    '/admin/products/{id}/edit',
    'App\Http\Controllers\Admin\AdminProductController@edit'
)->name('admin.product.edit');

Route::put(
    '/admin/products/{id}/update',
    'App\Http\Controllers\Admin\AdminProductController@update'
)->name('admin.product.update');

Route::get('/admin/products/{id}/edit',
    [App\Http\Controllers\Admin\AdminProductController::class, 'edit']
)->name('admin.product.edit');

Route::put('/admin/products/{id}/update',
    [App\Http\Controllers\Admin\AdminProductController::class, 'update']
)->name('admin.product.update');

});

Auth::routes();


