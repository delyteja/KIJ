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

Route::get('/', 'IndexController@index')->name('basic_index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');

Route::prefix('pemasukan')->group(function()
{
	Route::get('/create','PemasukanController@create');
	Route::get('/edit/{id}','PemasukanController@edit');
	Route::get('/delete/{id}','PemasukanController@delete');
	Route::post('/store','PemasukanController@store');
	Route::get('/gaji_pokok','PemasukanController@gaji_pokok');
	Route::get('/detail/{id}','PemasukanController@detail');
	Route::get('/excel/{id}','PemasukanController@excel');
});

Route::prefix('pengeluaran')->group(function()
{
	Route::get('/create','PengeluaranController@create')->name('tambah_pengeluaran');
	Route::get('/edit/{id}','PengeluaranController@edit');
	Route::get('/delete/{id}','PengeluaranController@delete')->name('del_pengeluaran');
	Route::post('/store','PengeluaranController@store');
	Route::get('/histori/{opsi}', 'PengeluaranController@histori')->name('histori');
	Route::get('excel/{id}', 'PengeluaranController@excel')->name('excelling');
});