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

use Endroid\QrCode\Factory as Qrcd;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/guru', 'GuruController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::get('/siswa', 'siswaController@index');

// Route::get('admin', function () {
//     return view('admin');
// });
Auth::routes();

Route::resource('/siswa', 'SiswaController');
Route::resource('/guru', 'GuruController');

Route::get('/anjay', function() {
    echo Qrcd::create('tes');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    //
});

