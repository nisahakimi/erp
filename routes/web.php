<?php

use App\Http\Controllers\PelangganController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Pelanggan
Route::get('/pelanggans', 'PelangganController@index')->name('pelanggans.index');
Route::get('/pelanggans/create', 'PelangganController@create')->name('pelanggans.create');
Route::post('/pelanggans', 'PelangganController@store')->name('pelanggans.store');
Route::get('/pelanggans/{pelanggan}','PelangganController@show')->name('pelanggans.show');
Route::get('/pelanggans/{pelanggan}/edit', 'PelangganController@edit')->name('pelanggans.edit');
Route::patch('/pelanggans/{pelanggan}','PelangganController@update')->name('pelanggans.update');
Route::delete('pelanggans/{pelanggan}/', 'PelangganController@destroy')->name('pelanggans.destroy');

//ResourceController
// Route::resource('pelanggans', 'PelangganController');

//KategoriProduk
// Route::get('/kategoriproduks','KategoriProdukController@index')->name('kategoriproduks.index');
Route::resource('kategoriproduks', 'KategoriProdukController');

//Pemasok
Route::resource('pemasoks', 'PemasokController');

//Bahan
Route::resource('bahans', 'BahanController');

//Produk
Route::resource('produks', 'ProdukController');
Route::patch('/produks/{produk}/tambahstok', 'ProdukController@tambahstok')->name('produks.tambahstok');

//Karyawan
Route::resource('karyawans', 'KaryawanController');

//Penjualan
Route::resource('penjualans', 'PenjualanController');

//Pembelian
Route::resource('pembelians', 'PembelianController');
Route::get('/pembelians/{pembelian}/cetakfaktur','PembelianController@cetakFaktur')->name('pembelians.cetakfaktur');

//Pesanan
Route::resource('pesanans', 'PesananController');

//Arsip Pesanan
Route::get('/arsippesanans', 'ArsipPesananController@index')->name('arsippesanans.index');

//Jenis Pengeluaran
Route::resource('jenispengeluarans', 'JenisPengeluaranController');

//Pengeluaran
Route::resource('pengeluarans','PengeluaranController');

//Laporan
Route::get('/laporanpembelians','LaporanPembelianController@index')->name('laporanpembelians.index');
// Route::get('/laporanpembelians/getReportData','LaporanPembelianController@getDataPerDate')->name('laporanpembelians.report');
Route::get('/laporanpembelians/cetak_pdf/{daterange}','LaporanPembelianController@cetak')->name('laporanpembelians.cetak');
