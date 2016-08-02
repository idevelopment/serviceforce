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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Profile
Route::get('/profile', 'ProfileController@index')->name('profile.index');
Route::post('/profile/update/info', 'ProfileController@storeInformation')->name('profile.update.information');
Route::post('/profile/update/password', 'ProfileController@updateCredentials')->name('profile.update.credentials');

// Customers routes
Route::get('/customers', 'CustomersController@index')->name('customers.index');
Route::get('/customers/register', 'CustomersController@register')->name('customers.register');
Route::get('/customers/display/{id}', 'CustomersController@edit')->name('customers.display');
Route::post('/customers/register', 'CustomersController@store')->name('customers.store');
Route::get('/customers/active/{id}', 'CustomersController@ActivateCustomer')->name('customers.active');
Route::get('/customers/suspend/{id}', 'CustomersController@SuspendCustomer')->name('customers.suspend');
Route::get('/customers/delete/{id}', 'CustomersController@destroy')->name('customers.destroy');

// Servers routes
Route::get('/servers', 'ServersController@index')->name('servers.index');
Route::get('/servers/lookup', 'ServersController@getServers')->name('servers.lookup');
Route::get('/servers/display/{id}', 'ServersController@display')->name('servers.display');
Route::get('/servers/remove/{id}', 'ServersController@deleteServerQ')->name('servers.deleteQ');

Route::get('/servers/create', 'ServersController@create')->name('servers.create');
Route::post('/servers/create', 'ServersController@store')->name('servers.create');

// Webhosting
Route::get('/webhosting', 'WebhostingController@index')->name('webhosting.index');
Route::get('/webhosting/lookup', 'WebhostingController@listWebHostingAccounts')->name('webhosting.list');
Route::get('/webhosting/manage/{name}', 'WebhostingController@edit')->name('webhosting.manage');
