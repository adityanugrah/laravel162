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


Route::group(['middleware' => 'auth'], function () {

Route::get('/', ['as'=>'dashboard', function () {
	return View::make('include.dashboard');
}]);

Route::get('send','mailController@send');

Route::get('/home', 'HomeController@index');

//download template
Route::get('/download/{file}', 'DownloadController@download');

Route::resource('databarang/seragam', 'SeragamController');
Route::resource('databarang/preused', 'PreusedController');
Route::resource('databarang/loker', 'LokerController');
Route::resource('databarang/tools', 'ToolsController');

Route::resource('supplier', 'SupplierController');

Route::resource('transaksi/transaksimasuk', 'TransaksiMasukController');
Route::resource('transaksi/transaksikeluar', 'TransaksiKeluarController');

Route::resource('laporan/laporanmasuk', 'LaporanMasukController');
Route::resource('laporan/laporankeluar', 'LaporanKeluarController');

Route::get('importExport', 'ImportSeragamController@importExport');
Route::post('importSeragam', 'ImportSeragamController@importSeragam');

Route::get('importExport', 'ImportPreusedController@importExport');
Route::post('importPreused', 'ImportPreusedController@importPreused');

Route::get('importExport', 'ImportLokerController@importExport');
Route::post('importLoker', 'ImportLokerController@importLoker');

Route::get('importExport', 'ImportToolsController@importExport');
Route::post('importTools', 'ImportToolsController@importTools');

Route::get('importExport', 'ImportToolsController@importExport');
Route::post('importSupplier', 'ImportSupplierController@importSupplier');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

//TransaksiMasuk
Route::get('transaksi/cobaSeragam/{id}', 'TransaksiMasukController@cobaSeragam');

// Route::get('/transaksi/getSupplier/{id}', 'getDataController@ambilNamaSupplier');

Route::get('/transaksi/getBarang/{id}/{kode}', 'getDataController@ambilHargaBarang');

Route::get('/transaksi/getKodeMasuk', 'KodeMasukController@index');

//TransaksiKeluar
Route::get('transaksi/namabarang/{id}', 'TransaksiKeluarController@namabarang');

Route::get('/transaksi/getKodeKeluar', 'KodeKeluarController@index');

});

Auth::routes();