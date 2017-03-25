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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'auth'], function () {

Route::get('/', ['as'=>'dashboard', function () {
	return View::make('include.dashboard');
}]);

Route::resource('databarang/seragam', 'SeragamController');
Route::resource('databarang/preused', 'PreusedController');
Route::resource('databarang/loker', 'LokerController');
Route::resource('databarang/tools', 'ToolsController');

Route::resource('supplier', 'SupplierController');

Route::resource('transaksi/transaksimasuk', 'TransaksiMasukController');
Route::resource('transaksi/transaksikeluar', 'TransaksiKeluarController');

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

Route::get('transaksi/cobaSeragam/{id}', 'TransaksiMasukController@cobaSeragam');

Route::get('/home', 'HomeController@index');

});

Auth::routes();