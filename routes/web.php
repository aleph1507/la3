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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about_us', function() {
  return view('about_us');
})->name('about_us');

Route::get('/about_book', function() {
  return view('about_book');
})->name('about_book');

// Route::get('/buy_the_book', function() {
//   return view('buy_the_book');
// })->name('buy_the_book');


Route::get('/buy_the_book', 'SellsController@index')->name('buy_the_book');

Route::get('/get-ccs', 'SellsController@getCC')->name('getCC');

Route::get('/contact', function() {
  return view('contact');
})->name('contact');

Route::get('/newuser', 'CouponsController@create')->name('newcoupon');

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/paypalipn', 'SellsController@paypalIpn')->name('paypalIPN');
