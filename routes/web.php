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

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('location', 'LocationController');
    Route::put('/location/verify/{location}', 'LocationController@verifyLocation')->name('location.verify');
    Route::get('/wtofile', 'UploadWtoController@index')->name('wto.index');
});

Route::get('/user-location', 'LocationController@createByUser')->name('user-location.create');
Route::post('/user-location', 'LocationController@storeByUser')->name('user-location.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadWtoController@create')->name('upload.create');
Route::post('/upload', 'UploadWtoController@store')->name('upload.store');
Route::get('/download', 'UploadWtoController@serve')->name('upload.serve');
