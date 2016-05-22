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

Route::get('/', function () {
    return view('frontpage');
});

Route::auth();

// Add items
Route::get('add_item', 'AddItemController@index');

// User items
Route::get('items', 'ItemsController@index');

// Inbox
Route::get('inbox', 'InboxController@index');

// Profile
Route::get('profile', 'ProfileController@index');
