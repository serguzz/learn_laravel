<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

//use App\Http\Controllers\HomeController;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::view('/login','auth.login')->name('login');
//Route::view('/logout','auth.logout')->name('logout');
Route::view('/register','auth.register')->name('register');


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cartIndex');
Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addToCart')->name('addToCart');


Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');

Route::get('/{cat}', 'App\Http\Controllers\ProductController@showCategory')->name('showCategory');
Route::get('/{cat}/{product_id}', 'App\Http\Controllers\ProductController@show')->name('showProduct');
