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

Route::get('/admin', function () {
    $domain = uccello()->useMultiDomains() ? uccello()->getLastOrDefaultDomain()->slug : null;
    $route = ucroute('uccello.home', $domain);
    return redirect($route);
});

Route::get('/', 'SiteController@index')->name('home');
Route::get('/product/search', 'SiteController@search')->name('product.search');
Route::get('/product/{id}/{name}', 'SiteController@product')->name('product');
Route::get('/category/{id}/{name}', 'SiteController@category')->name('category');
Route::get('/favorites', 'SiteController@favorites')->name('favorites');
Route::get('/cart', 'SiteController@cart')->name('cart');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
