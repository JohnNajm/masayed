<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/contact', 'App\Http\Controllers\PagesController@contact');
Route::get('/faq', 'App\Http\Controllers\PagesController@faq');
Route::get('/tac', 'App\Http\Controllers\PagesController@tac');
Route::get('/legal', 'App\Http\Controllers\PagesController@legal');


Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/product/{product}', 'App\Http\Controllers\ShopController@show');    
Route::get('/products', 'App\Http\Controllers\ShopController@index')->name('products.index');


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart', 'App\Http\Controllers\CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'App\Http\Controllers\CartController@destroy')->name('cart.destroy');

Route::get('empty', function () {
    ShoppingCart::destroy();
});

Route::get('/checkout', 'App\Http\Controllers\CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::get('/guestCheckout', 'App\Http\Controllers\CheckoutController@index')->name('guestcheckout.index');

Route::post('/checkout2', 'App\Http\Controllers\CheckoutController@store')->name('checkout.store');
Route::post('/checkouts', 'App\Http\Controllers\CheckoutController@debug')->name('checkout.debug');


Route::get('/search', 'App\Http\Controllers\ShopController@search')->name('search');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/profile','App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::patch('/profile','App\Http\Controllers\UsersController@update')->name('users.update');
    
    Route::get('/order/{id}', 'App\Http\Controllers\UsersController@showOrder')->name('order.show');    

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
