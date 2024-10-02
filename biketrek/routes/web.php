<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
    Route::get('/admin', 'App\Http\Controllers\HomeController@admin')->name("home.admin");
    Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
    Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
    Route::post('/admin/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
    Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
    Route::get('/products/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('product.edit'); // Nueva ruta para editar producto
    Route::put('/products/{id}', 'App\Http\Controllers\ProductController@update')->name('product.update'); // Nueva ruta para actualizar producto
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
    Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
    Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
    Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
    Route::post('/orders', 'App\Http\Controllers\OrderController@store')->name('orders.store');
    Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
    Route::get('/orders/{id}/edit', 'App\Http\Controllers\OrderController@edit')->name('orders.edit');
    Route::put('/orders/{id}', 'App\Http\Controllers\OrderController@update')->name('orders.update');
    Route::delete('/orders/{id}', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');