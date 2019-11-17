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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('visitor/home', 'HomeController@index');

Route::get('admin/home', 'AdminController@index')->middleware('admin');
Route::get('sewa/saya', 'TransaksiController@transaksiSaya');
Route::get('profil/saya', 'UserController@profilSaya');
Route::get('profil/{id}', 'UserController@profilUser');
Route::get('profil/edit/{id}', 'UserController@editProfil');
Route::post('profil/update/{id}', 'UserController@prosesEditProfil');

Route::get('iklan/saya', 'IklanController@iklanSaya');
Route::get('iklan/tambah', 'IklanController@buatIklan');
Route::post('iklan/create', 'IklanController@prosesBuatIklan');
Route::get('iklan/edit/{id}', 'IklanController@editIklan');
Route::post('iklan/update', 'IklanController@prosesEditIklan');
Route::get('iklan/detail/{id}', 'IklanController@detailIklan');
Route::get('iklan/delete/{id}', 'IklanController@hapusIklan');
Route::get('iklan/gambar/delete/{id}', 'IklanController@hapusGambar');
Route::get('iklan/ulasan/tambah/{id}', 'IklanController@tambahUlasan');

