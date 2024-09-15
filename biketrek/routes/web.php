<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
