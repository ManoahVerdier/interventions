<?php
/**
 * Web routes
 */
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/product/search', 'SiteController@search')
    ->name('product.search')
    ->middleware('auth');
Route::get('/product/search/results', 'SiteController@searchResults')
    ->name('material.search.results')
    ->middleware('auth');
Route::get('/material/{id}/{name}', 'SiteController@material')
    ->name('material')
    ->middleware('auth');
Route::post('/material/{id}/{name}', 'SiteController@materialPost')
    ->name('material')
    ->middleware('auth');
Route::get('/product_range/{id}/brands', 'SiteController@searchBrands')
    ->name('product_range.brands')
    ->middleware('auth');
Route::get('/product_range/{id}/{name}', 'SiteController@productRange')
    ->name('product_range')
    ->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');