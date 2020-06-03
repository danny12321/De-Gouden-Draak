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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/kassa', 'CashDeskController@index')->name('cashdesk');
Route::get('/kassa/gerechten', 'DishesController@index')->name('dishes');
Route::get('/kassa/sales', 'SalesoverviewController@index')->name('salesoverview');

Route::get('/admin', 'Admin\DishesController@index')->name('admin.dishes');
Route::get('/admin/dishes/create', 'Admin\DishesController@create')->name('admin.dishes.create');
Route::post('/admin/dishes', 'Admin\DishesController@store')->name('admin.dishes.store');
Route::get('/admin/dishes/{menuitem}/edit', 'Admin\DishesController@edit')->name('admin.dishes.edit');
Route::put('/admin/dishes/{menuitem}', 'Admin\DishesController@update')->name('admin.dishes.update');
Route::delete('/admin/dishes/{menuitem}', 'Admin\DishesController@destroy')->name('admin.dishes.delete');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/news', function() {
    return view('news');
})->name('news');
