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


Auth::routes();

Route::get('/tablet/{table}', 'TabletController@index')->name('tablet');
Route::post('/tablet/order/{table}', 'TabletController@store')->name('tablet_order');
Route::post('/tablet/{table}/store_guest', 'GuestsController@store_tablet')->name('guest_store_tablet');

Route::get('/kassa', 'CashDeskController@index')->name('cashdesk');
Route::get('/kassa/gerechten', 'DishesController@index')->name('dishes');
Route::get('/kassa/sales', 'SalesoverviewController@index')->name('salesoverview');
Route::get('/kassa/tafels', 'TableController@index')->name('table');
Route::post('/kassa/tafel/{table}/store_guest', 'GuestsController@store')->name('guest_store');
Route::post('/kassa/order/{table}', 'OrdersController@store')->name('order_store');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/news', function() {
    return view('news');
})->name('news');
