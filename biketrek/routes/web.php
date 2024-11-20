<?php

use App\Http\Middleware\AdminAuthMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

    Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
    Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
    Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
    Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");

    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
    Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
    Route::post('/orders', 'App\Http\Controllers\OrderController@store')->name('orders.store');
    Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
    Route::get('/orders/{id}/edit', 'App\Http\Controllers\OrderController@edit')->name('orders.edit');
    Route::put('/orders/{id}', 'App\Http\Controllers\OrderController@update')->name('orders.update');
    Route::delete('/orders/{id}/delete', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');


    Route::middleware(['auth', AdminAuthMiddleware::class])->group(function () {
        Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home");
        Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
        Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");
        Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name("admin.product.save");
        Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit'); 
        Route::put('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update'); 
        Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    });

    Auth::routes();
