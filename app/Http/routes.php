<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();
Route::get('/', function () { return view('welcome'); });
Route::get('/home', 'HomeController@index');

// Customers routes
Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/register', 'CustomersController@register')->name('customers.register');
Route::get('/customers/display/{id}', 'CustomersController@edit')->name('customers.display');
Route::post('/customers', 'CustomersController@store')->name('customers.store');

// Servers routes
Route::get('/servers', 'ServersController@index');
Route::post('/servers', 'ServersController@display');


