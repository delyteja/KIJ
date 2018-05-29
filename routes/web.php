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
<<<<<<< HEAD
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');


Route::prefix('pemasukan')->group(function()
{
	Route::get('/create','PemasukanController@create');
	Route::get('/edit/{id}','PemasukanController@edit');
	Route::get('/delete/{id}','PemasukanController@delete');
	Route::post('/store','PemasukanController@store');
	Route::get('/gaji_pokok','PemasukanController@gaji_pokok');
	Route::get('/gaji_tunjangan','PemasukanController@gaji_tunjangan');
});
=======
>>>>>>> 9d453816c067685c40ec610f860e5d1dc1abf07b
