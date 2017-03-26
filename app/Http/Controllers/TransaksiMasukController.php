<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiMasuk;
use App\Supplier;
use App\Seragam;
use App\Preused;
use App\Tools;
use App\Loker;
use Validator;

use DB;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplierz = Supplier::orderBy('KodeSupplier')->get(); 

        $seragamz = Seragam::orderBy('KodeSeragam')->get(); 

        $masukz = TransaksiMasuk::orderBy('KodeMasuk')->get(); 

        return view('transaksimasuk.index', compact('masukz','supplierz','seragamz'));
    }

    public function cobaSeragam($id){

        if($id=="Seragam") {
            $data=Seragam::orderBy('KodeSeragam')->get();
        } else if ($id=="Preused") {
            $data=Preused::orderBy('KodePreused')->get(); 
        } else if ($id=="Loker") {
            $data=Loker::orderBy('KodeLoker')->get(); 
        } else if ($id=="Tools") {
            $data=Tools::orderBy('KodeTools')->get(); 
        } else {
            $data = "Tidak Ada Data";
        }

        return view('transaksimasuk.coba',compact('data','id'));
    }
    /**qexd
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
        try {
            $masuk = new TransaksiMasuk;
            $masuk->KodeMasuk       = $request->KodeMasuk;
            $masuk->Tgl_Masuk       = $request->Tgl_Masuk;
            $masuk->KodeSupplier    = $request->KodeSupplier;   
            $masuk->NamaSupplier    = $request->NamaSupplier;   
            $masuk->JenisBrg        = $request->JenisBrg;   
            $masuk->KodeBrg         = $request->KodeBrg;   
            $masuk->NamaBrg         = $request->NamaBrg;   
            $masuk->JumlahBrg       = $request->JumlahBrg;   
            $masuk->HargaBrg        = $request->HargaBrg;   

            $seragam = Seragam::find($request->KodeBrg);
            //return $request->KodeBrg;
            $seragam->StokSeragam = $seragam->StokSeragam + $request->JumlahBrg;

            $seragam->save();
            $masuk->save();
            return redirect('transaksi/transaksimasuk')->with('pesan_sukses', 'Transaksi Masuk has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('transaksi/transaksimasuk')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('transaksi/transaksimasuk')->with('pesan_gagal', $e->getMessage());
        }
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
