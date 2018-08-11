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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/', 'HomeController');
Route::post('/store', 'HomeController@store');
Route::get('/{file_id}/edit', 'HomeController@edit');
Route::get('/update', 'HomeController@update');
Route::post('pageArray', 'HomeController@PageArray');
Route::post('create_water_mark', 'HomeController@createWaterMark');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/libreoffice', 'HomeController@libreoffice');
