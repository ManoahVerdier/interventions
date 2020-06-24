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
Route::get('/product/search/results', 'SiteController@searchResults')->name('product.search.results');
Route::get('/product/{id}/{name}', 'SiteController@product')->name('product');
Route::get('/category/{id}/brands', 'SiteController@searchBrands')->name('category.brands');
Route::get('/category/{id}/{name}', 'SiteController@category')->name('category');
Route::get('/category/{categoryId}/brand/{brandId}', 'SiteController@categoryBrand')->name('category.brand');
Route::get('/favorites', 'SiteController@favorites')->name('favorites')->middleware('auth');
Route::get('/favorites/{id}', 'SiteController@toggleFavorite')->name('favorites.toggle')->middleware('auth');
Route::get('/cart', 'SiteController@cart')->name('cart')->middleware('auth');
Route::post('/cart', 'SiteController@addToCart')->name('cart.add')->middleware('auth');
Route::post('/cart/update', 'SiteController@updateCart')->name('cart.update')->middleware('auth');
Route::post('/cart/delete', 'SiteController@deleteFromCart')->name('cart.delete')->middleware('auth');
Route::post('/cart/validate', 'SiteController@validateCart')->name('cart.validate')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/activation', 'SiteController@activation')->name('activation');
