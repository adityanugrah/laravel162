<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiKeluar;
use App\DetailKeluar;
use Excel;
use PDF;

class LaporanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfKeluar () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $TransaksiKeluar = TransaksiKeluar::all();
        $detail = DetailKeluar::all();
        $pdf = PDF::loadView('laporankeluar.cetak', ['keluar'=>$TransaksiKeluar, 'keluard'=>$detail])->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Transaksi Keluar.pdf');
    }

    public function index()
    {
        $keluar = TransaksiKeluar::orderBy('KodeKeluar')->get();
        return view('laporankeluar.index', compact('keluar'));
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
        $keluar1 = TransaksiKeluar::where('KodeKeluar', "$id")->get();
        $keluar = DetailKeluar::where('KodeKeluar', "$id")->get();
        return view('laporankeluar.show', compact('keluar','keluar1'));
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
