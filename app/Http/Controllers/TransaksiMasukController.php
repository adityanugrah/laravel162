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

        } else if ($id=="Tools") {

        } else {

        }

        return view('transaksimasuk.coba',compact('data'));
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
        try {
            $seragam = new Seragam;
            $seragam->KodeSeragam = $request->KodeSeragam;
            $seragam->NamaSeragam = $request->NamaSeragam;
            $seragam->Keterangan  = $request->Keterangan;   

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/seragam';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $seragam['Picture']=$filename; 
        
            $seragam->save();
            return redirect('databarang/seragam')->with('pesan_sukses', 'Data seragam has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('databarang/seragam')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('databarang/seragam')->with('pesan_gagal', $e->getMessage());
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
