<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'SiteController@index')->name('home');
Route::get('/search', 'SiteController@search')->name('search');
Route::get('/product', 'SiteController@product')->name('product');
Route::get('/category', 'SiteController@category')->name('category');
Route::get('/favorites', 'SiteController@favorites')->name('favorites');
