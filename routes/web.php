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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('admin', 'UserController@index')->name('admin');
    Route::post('activateUser{id}', 'UserController@activateUser')->name('activateUser');
    Route::post('deactivateUser{id}', 'UserController@deactivateUser')->name('deactivateUser');
    Route::post('deleteUser{id}', 'UserController@deleteUser')->name('deleteUser');
    Route::get('updateUser{id}', 'UserController@updateUser')->name('updateUser');
    Route::post('editUser{id}', 'UserController@editUser')->name('editUser');

    Route::get('user', 'UserController@index')->name('user');
});