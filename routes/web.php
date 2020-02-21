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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/p/{product}', 'ProductController@detail')->name('product.detail');

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function() {
    Route::get('show', 'CartController@show')->name('show');
    Route::post('add/{product}', 'CartController@add')->name('add');
    Route::post('update/{cart_item}', 'CartController@update')->name('update');
    Route::post('remove/{cart_item}', 'CartController@remove')->name('remove');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function() {
    Route::get('show', 'CheckoutController@show')->name('show');
    Route::post('submit', 'CheckoutController@submit')->name('submit');
});

Route::group(['prefix' => 'seller', 'as' => 'seller.', 'middleware' => ['auth']], function() {
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('create', 'ProductController@create')->name('create');
        Route::get('list', 'ProductController@index')->name('index');
        Route::get('edit/{product}', 'ProductController@edit')->name('edit');
        Route::post('store', 'ProductController@store')->name('store');
        Route::delete('destroy/{product}', 'ProductController@destroy')->name('destroy');
        Route::put('update/{product}', 'ProductController@update')->name('update');
    });

    Route::resource('media', 'MediaController')->only(['destroy', 'store']);
});

Route::group(['prefix' => 'messages', 'as' => 'messages.', 'middleware' => ['auth']], function () {
    Route::get('/', ['uses' => 'MessagesController@index'])->name('index');
    Route::get('create', ['uses' => 'MessagesController@create'])->name('create');
    Route::post('/', ['uses' => 'MessagesController@store'])->name('store');
    Route::get('{id}', ['uses' => 'MessagesController@update'])->name('update');
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function () {
    Route::get('/profile/{user}', ['uses' => 'UserProfileController@show'])->name('profile');
    Route::get('/follow/{user}', ['uses' => 'UserProfileController@follow'])->name('follow');
    Route::get('/unfollow/{user}', ['uses' => 'UserProfileController@unfollow'])->name('unfollow');
});

Auth::routes();
