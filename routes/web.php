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

//Rute authentifikasi (Login, Daftar)
Auth::routes();

//Rute home
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('beranda', 'HomeController@index');
Route::get('cari', 'HomeController@pencarian');
Route::get('home/{key}', 'HomeController@perKategori');

//Rute admin
Route::get('daftar/user', 'AdminController@daftarUser');
Route::get('daftar/iklan', 'AdminController@daftarIklan');
Route::get('daftar/transaksi', 'AdminController@daftarTransaksi');
Route::get('daftar/pelaporan/user', 'AdminController@daftarPelaporanUser');
Route::get('daftar/pelaporan/iklan', 'AdminController@daftarPelaporanIklan');

//Rute user
Route::get('profil/saya', 'UserController@profilSaya');
Route::get('profil/edit/{id}', 'UserController@editProfil');
Route::post('profil/update/{id}', 'UserController@prosesEditProfil');
Route::get('profil/{id}', 'UserController@profilUser');
Route::get('user/lapor/{id}', 'UserController@laporkanUser');
Route::post('lapor/user/create', 'UserController@prosesLaporkanUser');

//Rute iklan
Route::get('iklan/saya', 'IklanController@iklanSaya');
Route::get('iklan/tambah', 'IklanController@buatIklan');
Route::post('iklan/create', 'IklanController@prosesBuatIklan');
Route::get('iklan/edit/{id}', 'IklanController@editIklan');
Route::post('iklan/update', 'IklanController@prosesEditIklan');
Route::get('iklan/detail/{id}', 'IklanController@detailIklan');
Route::get('iklan/delete/{id}', 'IklanController@hapusIklan');
Route::get('iklan/lapor/{id}', 'IklanController@laporkanIklan');
Route::post('lapor/iklan/create', 'IklanController@prosesLaporkanIklan');
Route::get('iklan/gambar/delete/{id}', 'IklanController@hapusGambar');
Route::get('iklan/ulasan/tambah/{id}', 'IklanController@tambahUlasan');

//Rute transaksi
Route::get('sewa/saya', 'TransaksiController@transaksiSaya');
Route::post('iklan/sewa', 'TransaksiController@sewaBarang');
Route::post('sewa/kirim', 'TransaksiController@kirimNotif');
Route::get('sewa/persetujuan/{id}', 'TransaksiController@persetujuan');
Route::post('sewa/setuju', 'TransaksiController@prosesSetuju');

//Route pesan
Route::get('/pesan', 'PesanController@index');