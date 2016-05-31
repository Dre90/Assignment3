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


// Frontpage
Route::get('/', 'HomeController@index');
Route::post('item/{categoryid}', 'HomeController@showcategory');
Route::get('item/{item}', 'HomeController@show');

// Add items
Route::get('add_item', 'AddItemController@index');
Route::post('add_item/new_item', 'AddItemController@store');

// User items
Route::get('items', 'ItemsController@index');
Route::delete('items/{item}', 'ItemsController@destroy');
Route::patch('items/{item}', 'ItemsController@update');
Route::get('items/{item}/edit', 'ItemsController@edit');

// Inbox
Route::get('inbox', 'InboxController@index');
Route::get('inbox/{conversation}', 'InboxController@show');
Route::post('inbox/{conversation}', 'InboxController@store');

// Profile
Route::get('profile', 'ProfileController@index');

// Edit profile
Route::get('edit_profile', 'ProfileController@edit');
