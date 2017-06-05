<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiMasuk;
use App\DetailMasuk;
use Excel;
use PDF;

class LaporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pdfMasuk () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $TransaksiMasuk = TransaksiMasuk::all();
        $detail = DetailMasuk::all();
        $pdf = PDF::loadView('laporanmasuk.cetak', ['masuk'=>$TransaksiMasuk, 'masukd'=>$detail])->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Transaksi Masuk.pdf');
    }

    public function index()
    {
        $masuk = TransaksiMasuk::orderBy('KodeMasuk')->get();
        $masukd = DetailMasuk::orderBy('KodeMasuk')->get();
        return view('laporanmasuk.index', compact('masuk','masukd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DetailMasuk::where('KodeMasuk', "$id")->get();
        return view('laporanmasuk.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
