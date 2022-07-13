<?php
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

/* FRONT END */
// Home
Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('home', 'App\Http\Controllers\Home@index');
Route::get('kontak', 'App\Http\Controllers\Home@kontak');
Route::get('pemesanan', 'App\Http\Controllers\Home@pemesanan');
Route::get('konfirmasi', 'App\Http\Controllers\Home@konfirmasi');
Route::get('pembayaran', 'App\Http\Controllers\Home@pembayaran');
Route::post('proses_pemesanan', 'App\Http\Controllers\Home@proses_pemesanan');
Route::get('berhasil/{par1}', 'App\Http\Controllers\Home@berhasil');
Route::get('cetak/{par1}', 'App\Http\Controllers\Home@cetak');
Route::get('javawebmedia', 'App\Http\Controllers\Home@javawebmedia');
Route::get('aksi', 'App\Http\Controllers\Aksi@index');
Route::get('aksi/status/{par1}', 'App\Http\Controllers\Aksi@status');
Route::get('track','App\Http\Controllers\Home@track');
Route::get('result','App\Http\Controllers\Home@result');
Route::get('faq','App\Http\Controllers\Home@faq');

// Login
Route::get('login', 'App\Http\Controllers\Login@index');
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');

/* END FRONT END */
/* BACK END */

// menu baru kiriman
Route::get('admin/kiriman', 'App\Http\Controllers\Admin\Kiriman@index');
Route::get('admin/kiriman/edit/{par1}', 'App\Http\Controllers\Admin\Kiriman@edit');
Route::post('admin/kiriman/tambah', 'App\Http\Controllers\Admin\Kiriman@tambah');
Route::post('admin/kiriman/proses_edit', 'App\Http\Controllers\Admin\Kiriman@proses_edit');
Route::get('admin/kiriman/delete/{par1}', 'App\Http\Controllers\Admin\Kiriman@delete');
Route::post('admin/kiriman/proses', 'App\Http\Controllers\Admin\Kiriman@proses');

// user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::post('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::get('admin/user/edit/{par1}', 'App\Http\Controllers\Admin\User@edit');
Route::post('admin/user/proses_edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::get('admin/user/delete/{par1}', 'App\Http\Controllers\Admin\User@delete');
Route::post('admin/user/proses', 'App\Http\Controllers\Admin\User@proses');

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

// master status
Route::get('admin/status', 'App\Http\Controllers\Admin\Status@index');
Route::post('admin/status/tambah', 'App\Http\Controllers\Admin\Status@tambah');
Route::get('admin/status/edit/{par1}', 'App\Http\Controllers\Admin\Status@edit');
Route::post('admin/status/proses_edit', 'App\Http\Controllers\Admin\Status@proses_edit');
Route::get('admin/status/delete/{par1}', 'App\Http\Controllers\Admin\Status@delete');
Route::post('admin/status/proses', 'App\Http\Controllers\Admin\Status@proses');


// update status track
Route::get('admin/track', 'App\Http\Controllers\Admin\Track@index');
Route::post('admin/track/tambah', 'App\Http\Controllers\Admin\Track@tambah');
Route::get('admin/track/edit/{par1}', 'App\Http\Controllers\Admin\Track@edit');
Route::post('admin/track/proses_edit', 'App\Http\Controllers\Admin\Track@proses_edit');
Route::get('admin/track/delete/{par1}', 'App\Http\Controllers\Admin\Track@delete');
Route::post('admin/track/proses', 'App\Http\Controllers\Admin\Track@proses');



// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::get('admin/konfigurasi/profil', 'App\Http\Controllers\Admin\Konfigurasi@profil');
Route::get('admin/konfigurasi/icon', 'App\Http\Controllers\Admin\Konfigurasi@icon');
Route::get('admin/konfigurasi/email', 'App\Http\Controllers\Admin\Konfigurasi@email');
Route::get('admin/konfigurasi/gambar', 'App\Http\Controllers\Admin\Konfigurasi@gambar');
Route::get('admin/konfigurasi/pembayaran', 'App\Http\Controllers\Admin\Konfigurasi@pembayaran');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');
Route::post('admin/konfigurasi/proses_icon', 'App\Http\Controllers\Admin\Konfigurasi@proses_icon');
Route::post('admin/konfigurasi/proses_email', 'App\Http\Controllers\Admin\Konfigurasi@proses_email');
Route::post('admin/konfigurasi/proses_gambar', 'App\Http\Controllers\Admin\Konfigurasi@proses_gambar');
Route::post('admin/konfigurasi/proses_pembayaran', 'App\Http\Controllers\Admin\Konfigurasi@proses_pembayaran');
Route::post('admin/konfigurasi/proses_profil', 'App\Http\Controllers\Admin\Konfigurasi@proses_profil');


// kategori
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::post('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::post('admin/kategori/edit', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{par1}', 'App\Http\Controllers\Admin\Kategori@delete');
// status
Route::get('admin/status_site', 'App\Http\Controllers\Admin\Status_site@index');
Route::post('admin/status_site/tambah', 'App\Http\Controllers\Admin\Status_site@tambah');
Route::post('admin/status_site/edit', 'App\Http\Controllers\Admin\Status_site@edit');
Route::get('admin/status_site/delete/{par1}', 'App\Http\Controllers\Admin\Status_site@delete');
// status
Route::get('admin/heading', 'App\Http\Controllers\Admin\Heading@index');
Route::post('admin/heading/tambah', 'App\Http\Controllers\Admin\Heading@tambah');
Route::post('admin/heading/edit', 'App\Http\Controllers\Admin\Heading@edit');
Route::get('admin/heading/delete/{par1}', 'App\Http\Controllers\Admin\Heading@delete');
// status

// faq
Route::get('admin/faq', 'App\Http\Controllers\Admin\Faq@index');
Route::post('admin/faq/tambah', 'App\Http\Controllers\Admin\Faq@tambah');
Route::get('admin/faq/edit/{par1}', 'App\Http\Controllers\Admin\Faq@edit');
Route::post('admin/faq/proses_edit', 'App\Http\Controllers\Admin\Faq@proses_edit');
Route::get('admin/faq/delete/{par1}', 'App\Http\Controllers\Admin\Faq@delete');
Route::post('admin/faq/proses', 'App\Http\Controllers\Admin\Faq@proses');


// staff
Route::get('admin/staff', 'App\Http\Controllers\Admin\Staff@index');
Route::get('admin/staff/cari', 'App\Http\Controllers\Admin\Staff@cari');
Route::get('admin/staff/status_staff/{par1}', 'App\Http\Controllers\Admin\Staff@status_staff');
Route::get('admin/staff/kategori/{par1}', 'App\Http\Controllers\Admin\Staff@kategori');
Route::get('admin/staff/detail/{par1}', 'App\Http\Controllers\Admin\Staff@detail');
Route::get('admin/staff/tambah', 'App\Http\Controllers\Admin\Staff@tambah');
Route::get('admin/staff/edit/{par1}', 'App\Http\Controllers\Admin\Staff@edit');
Route::get('admin/staff/delete/{par1}', 'App\Http\Controllers\Admin\Staff@delete');
Route::post('admin/staff/tambah_proses', 'App\Http\Controllers\Admin\Staff@tambah_proses');
Route::post('admin/staff/edit_proses', 'App\Http\Controllers\Admin\Staff@edit_proses');
Route::post('admin/staff/proses', 'App\Http\Controllers\Admin\Staff@proses');
// site



/* END BACK END*/
