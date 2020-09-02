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

Route::get('/', 'SiteController@index')->name('home')->middleware('auth');
Route::get('/product/search', 'SiteController@search')->name('product.search')->middleware('auth');
Route::get('/product/search/results', 'SiteController@searchResults')->name('product.search.results')->middleware('auth');
Route::get('/product/{id}/{name}', 'SiteController@product')->name('product')->middleware('auth');
Route::get('/category/{id}/brands', 'SiteController@searchBrands')->name('category.brands')->middleware('auth');
Route::get('/category/{id}/{name}', 'SiteController@category')->name('category')->middleware('auth');
//Route::get('/category/{categoryId}/brand/{brandId}', 'SiteController@categoryBrand')->name('category.brand');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');