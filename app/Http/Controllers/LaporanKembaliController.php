<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiKembali;
use App\DetailKembali;
use PDF;

class LaporanKembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pdfKembali () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $TransaksiKembali = TransaksiKembali::all();
        $detaild = DetailKembali::all();
        $pdf = PDF::loadView('laporankembali.cetak', ['kembali'=>$TransaksiKembali, 'kembalid'=>$detaild])->setPaper('a4', 'landscape');
        return $pdf->download('Laporan Pengembalian.pdf');
    }

    public function index()
    {
        $kembali = TransaksiKembali::orderBy('KodeKembali')->get();
        $kembalid = DetailKembali::orderBy('KodeKembali')->get();
        return view('laporankembali.index', compact('kembali','kembalid'));
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
        $kembali1 = TransaksiKembali::where('KodeKembali', "$id")->get();
        $kembali = DetailKembali::where('KodeKembali', "$id")->get();
        return view('laporankembali.show', compact('kembali1','kembali'));
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
