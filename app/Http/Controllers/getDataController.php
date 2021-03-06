<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;

use App\Seragam;
use App\Preused;
use App\Loker;
use App\Tools;
use App\Karyawan;
use App\TransaksiKeluar;
use App\DetailKeluar;

class getDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ambilNamaSupplier($id){
        $sup = Supplier::find($id);
        return $sup->NamaSupplier;
    }

    public function ambilHargaBarang($id,$kode){
        if($kode=="Seragam") {
            $kode = Seragam::where('NamaSeragam', '=', $id)->first();
            return $kode->HrgSeragam;
        } else if ($kode=="Preused") {
            $kode = Preused::where('NamaPreused', '=', $id)->first();
            return $kode->HrgPreused; 
        } else if ($kode=="Loker") {
            $kode = Loker::where('NamaLoker', '=', $id)->first();
            return $kode->HrgLoker;
        } else if ($kode=="Tools") {
            $kode = Tools::where('NamaTools', '=', $id)->first();
            return $kode->HrgTools;
        } else {
            $kode = "Tidak Ada Data";
            return $kode;
        }
    }

    public function ambilUkuran($id,$kode){
        if($kode=="Seragam") {
            $kode = DetailKeluar::where('NamaBrg', '=', $id)->first();
            return $kode->Size;
        } else if ($kode=="Preused") {
            $kode = DetailKeluar::where('NamaBrg', '=', $id)->first();
            return $kode->Size; 
        } else if ($kode=="Loker") {
            $kode = DetailKeluar::where('NamaBrg', '=', $id)->first();
            return $kode->HrgLoker;
        } else if ($kode=="Tools") {
            $kode = DetailKeluar::where('NamaBrg', '=', $id)->first();
            return $kode->Size;
        } else {
            $kode = "Tidak Ada Data";
            return $kode;
        }
    }

    public function ambilDepartemen($id){
        $dep = Karyawan::where('NamaKaryawan','=', $id)->first();
        return $dep->DepartemenKar;
    }

    public function ambilSize($id){
        $size = Seragam::where('NamaSeragam','=', $id)->first();
        return $size->Ukuran;
    }

    public function ambilData1($id){        
        if( $data1 = TransaksiKeluar::find($id)){
             if( $data11 = DetailKeluar::find($id)){
                return $data1->Tgl_Pinjam;
            } else {
                return "null";
            }
        } else {
            return "null";
        }
    }
    public function ambilData2($id){
        if( $data2 = TransaksiKeluar::find($id)){
             if( $data22 = DetailKeluar::find($id)){
                return $data2->Tgl_Kembali;
            } else {
                return "null";
            }
        } else {
            return "null";
        }     
    }
    public function ambilData3($id){
        if( $data3 = TransaksiKeluar::find($id)){
             if( $data33 = DetailKeluar::find($id)){
                return $data3->NamaKaryawan;
            } else {
                return "null";
            }
        } else {
            return "null";
        }
    }
    public function ambilData4($id){
        if( $data4 = TransaksiKeluar::find($id)){
             if( $data44 = DetailKeluar::find($id)){
                return $data4->NamaDepartemen;
            } else {
                return "null";
            }
        } else {
            return "null";
        }
    }
    public function ambilData5($id,$data5){
        $data5 = DetailKeluar::where('NamaBrg', '=', $id)->first();
        return $data5->Size;
    }
    public function ambilData6($id){
        $data6 = DetailKeluar::where('NamaBrg','=', $id)->first();
        return $data6->JumlahBrg;
    }

    public function index()
    {
        //
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
