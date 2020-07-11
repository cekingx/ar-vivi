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

Route::get('/user-location/create', 'UserLocationController@create')->name('user-location.create');
Route::post('/user-location', 'UserLocationController@store')->name('user-location.store');


Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('location', 'LocationController');
    Route::get('/wtofile', 'UploadWtoController@index')->name('wto.index');

    // User Location
    Route::get('/user-location', 'UserLocationController@index')->name('user-location.index');
    Route::get('/user-location/{user_location}', 'UserLocationController@show')->name('user-location.show');
    Route::delete('/user-location/{user_location}', 'UserLocationController@destroy')->name('user-location.delete');
    Route::post('/user-location/{user_location}/verify', 'UserLocationController@verify')->name('user-location.verify');

    // Object AR
    Route::resource('/objek-ar', 'ObjekARController');
});

// Route::resource('user-location', 'UserLocationController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload', 'UploadWtoController@create')->name('upload.create');
Route::post('/upload', 'UploadWtoController@store')->name('upload.store');
Route::get('/download', 'UploadWtoController@serve')->name('upload.serve');
