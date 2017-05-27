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
Route::resource('karyawan', 'KaryawanController');
Route::resource('departemen', 'DepartemenController');

Route::resource('laporan/laporanmasuk', 'LaporanMasukController');
Route::resource('laporan/laporankeluar', 'LaporanKeluarController');
Route::resource('laporan/laporankembali', 'LaporanKembaliController');

Route::resource('transaksi/transaksimasuk', 'TransaksiMasukController');
Route::resource('transaksi/transaksikeluar', 'TransaksiKeluarController');
Route::resource('transaksi/transaksikembali', 'TransaksiKembaliController');

Route::get('importExport', 'ImportSeragamController@importExport');
Route::post('importSeragam', 'ImportSeragamController@importSeragam');

Route::get('importExport', 'ImportPreusedController@importExport');
Route::post('importPreused', 'ImportPreusedController@importPreused');

Route::get('importExport', 'ImportLokerController@importExport');
Route::post('importLoker', 'ImportLokerController@importLoker');

Route::get('importExport', 'ImportToolsController@importExport');
Route::post('importTools', 'ImportToolsController@importTools');

Route::get('importExport', 'ImportSupplierController@importExport');
Route::post('importSupplier', 'ImportSupplierController@importSupplier');

Route::get('importExport', 'ImportKaryawanController@importExport');
Route::post('importKaryawan', 'ImportKaryawanController@importKaryawan');

Route::get('importExport', 'ImportDepartemenController@importExport');
Route::post('importDepartemen', 'ImportDepartemenController@importDepartemen');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

//TransaksiMasuk
Route::get('transaksi/cobaSeragam/{id}', 'TransaksiMasukController@cobaSeragam');

Route::get('transaksi/cobaBarang/{id}', 'TransaksiKembaliController@cobaBarang');

// coba ajax
Route::post('/ajaxNamaBrg', array('as' => 'ajaxNamaBrg', 'uses' => 'TransaksiKembaliController@ajaxNamaBrg' ));

Route::get('/transaksi/getBarang/{id}/{kode}', 'getDataController@ambilHargaBarang');


Route::get('/transaksi/getUkuran/{id}/{kode}', 'getDataController@ambilUkuran');

Route::get('/transaksi/getData1/{id}', 'getDataController@ambilData1');
Route::get('/transaksi/getData2/{id}', 'getDataController@ambilData2');
Route::get('/transaksi/getData3/{id}', 'getDataController@ambilData3');
Route::get('/transaksi/getData4/{id}', 'getDataController@ambilData4');
//tes
Route::get('/transaksi/getData5/{id}/{data5}', 'getDataController@ambilData5');
Route::get('/transaksi/getData6/{id}/{data6}', 'getDataController@ambilData6');

Route::get('/transaksi/getKodeMasuk', 'KodeMasukController@index');

//TransaksiKeluar
Route::get('/transaksi/getDep/{id}', 'getDataController@ambilDepartemen');
Route::get('/transaksi/getSize/{id}', 'getDataController@ambilSize');
Route::get('transaksi/namabarang/{id}', 'TransaksiKeluarController@namabarang');
Route::get('/transaksi/getKodeKeluar', 'KodeKeluarController@index');

});

Auth::routes();