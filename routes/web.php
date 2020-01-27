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

Route::get('/dasboard', function() {
    return view('sb-admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('location', 'LocationController');

Route::get('/upload', 'UploadWtoController@create')->name('upload.create');
Route::post('/upload', 'UploadWtoController@store')->name('upload.store');
Route::get('/download', 'UploadWtoController@serve')->name('upload.serve');
