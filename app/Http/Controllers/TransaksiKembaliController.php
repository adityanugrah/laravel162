<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransaksiKembali;
use App\DetailKeluar;
use App\Supplier;
use App\Seragam;
use App\Preused;
use App\Tools;
use App\Loker;
use App\Karyawan;
use App\Departemen;

class TransaksiKembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali = TransaksiKembali::orderBy('KodeKembali')->get(); 
        $detail = DetailKeluar::orderBy('KodeKeluar')->get(); 
        return view('transaksikembali.index', compact('kembali','detail'));
    }

    public function cobaBarang($kode, Request $request){
        $kodebar = $request->KodeKeluar;
        $jenisbar = $request->JenisBrg;

        if($kode=="Seragam") {
            $data=DetailKeluar::where('KodeKeluar', "P001")
                    ->where('JenisBrg', "Seragam")
                    ->get();
        } else if ($kode=="Preused") {
            $data=DetailKeluar::where('KodeKeluar', "P004")
                    ->where('JenisBrg', "Preused")
                    ->get();
        } else if ($kode=="Loker") {
            $data=DetailKeluar::where('KodeKeluar', "P004")
                    ->where('JenisBrg', "Loker")
                    ->get();
        } else if ($kode=="Tools") {
            $data=DetailKeluar::where('KodeKeluar', "P004")
                    ->where('JenisBrg', "Tools")
                    ->get(); 
        } else {
            $data = "Tidak Ada Data";
        }
        return view('transaksikembali.coba',compact('data','kode'));
    }

    public function ajaxNamaBrg(Request $request){
        if ($request->ajax()) {
            $datas = $request->all();
            $jenisBarang = $datas['JenisBrg'];
            $kodeKeluar = $datas['kodeKeluar'];
            $namaBarang = DetailKeluar::where('KodeKeluar',$kodeKeluar)
                            ->where('JenisBrg',$jenisBarang)->pluck('NamaBrg');
                            // dd($namaBarang);
                            if(count($namaBarang) > 0){
                                return response()->json($namaBarang);
                            } else {
                                return response()->json(['message' => 'Data notfound'], 404);
                            }
        }
        // return response()->json(['datas' => '$namaBarang']);
        return view('transaksikembali.index',compact('namaBarang'));
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
        //
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
