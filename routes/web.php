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
Route::get('/validasi', 'HomeController@validasi')->name('validasi');

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

Route::prefix('tambah_kategori')->group(function()
{
	Route::get('/jenis_kategori','KategoriController@create_jenis');
	Route::get('/nama_kategori_pemasukan','KategoriController@create_nama_pemasukan');
	Route::get('/nama_kategori_pengeluaran','KategoriController@create_nama_pengeluaran');
	Route::post('/store_jenis_kategori','KategoriController@store_jenis');
	Route::post('/store_nama_kategori_pemasukan','KategoriController@store_nama_pemasukan');
	Route::post('/store_nama_kategori_pengeluaran','KategoriController@store_nama_pengeluaran');

});








Route::post('/add_kategori', 'PemasukanController@addKategori')->name('add_kategori');