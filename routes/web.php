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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/kassa', 'CashDeskController@index')->name('cashdesk');
Route::get('/kassa/gerechten', 'DishesController@index')->name('dishes');
Route::get('/kassa/sales', 'SalesoverviewController@index')->name('salesoverview');