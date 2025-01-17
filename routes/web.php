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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/menu', 'MenuController@index')->name('menu');
Route::get('/menuonly', 'MenuController@show')->name('menuonly');

Route::get('/kassa', 'CashDeskController@index')->name('cashdesk');
Route::get('/kassa/gerechten', 'DishesController@index')->name('dishes');
Route::get('/kassa/sales', 'SalesoverviewController@index')->name('salesoverview');
Route::get('/kassa/tafels', 'TableController@index')->name('table');
Route::post('/kassa/tafel/{table}/store_guest', 'GuestsController@store')->name('guest_store');
Route::post('/kassa/order/{table}', 'OrdersController@store')->name('order_store');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\DishesController@index')->name('admin.dishes');
Route::get('/admin/dishes/create', 'Admin\DishesController@create')->name('admin.dishes.create');
Route::post('/admin/dishes', 'Admin\DishesController@store')->name('admin.dishes.store');
Route::get('/admin/dishes/{menuitem}/edit', 'Admin\DishesController@edit')->name('admin.dishes.edit');
Route::put('/admin/dishes/{menuitem}', 'Admin\DishesController@update')->name('admin.dishes.update');
Route::delete('/admin/dishes/{menuitem}', 'Admin\DishesController@destroy')->name('admin.dishes.delete');

Route::get('/admin/menuitemtype', 'Admin\MenuItemTypeController@index')->name('admin.menuitemtype');
Route::get('/admin/menuitemtype/create', 'Admin\MenuItemTypeController@create')->name('admin.menuitemtype.create');
Route::post('/admin/menuitemtype', 'Admin\MenuItemTypeController@store')->name('admin.menuitemtype.store');
Route::get('/admin/menuitemtype/{menuitemtype}/edit', 'Admin\MenuItemTypeController@edit')->name('admin.menuitemtype.edit');
Route::put('/admin/menuitemtype/{menuitemtype}', 'Admin\MenuItemTypeController@update')->name('admin.menuitemtype.update');
Route::delete('/admin/menuitemtype/{menuitemtype}', 'Admin\MenuItemTypeController@destroy')->name('admin.menuitemtype.delete');

Route::get('/order', 'OrderController@index')->name('order');
Route::get('/order/{order}', 'OrderController@show')->name('order.show');
Route::post('/order', 'OrderController@store')->name('order.store');

Route::get('/contact', function() {
    return view('contact');
})->name('contact');

Route::get('/news', function() {
    return view('news');
})->name('news');
