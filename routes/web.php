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
Route::get('/location', 'LocationController@index')->name('location.index');
Route::get('/location/create', 'LocationController@create')->name('location.create');
Route::post('/location/create', 'LocationController@store')->name('location.store');
