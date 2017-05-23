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
            $kode = Seragam::where('NamaPreused', '=', $id)->first();
            return $kode->HrgPreused; 
        } else if ($kode=="Loker") {
            $kode = Seragam::where('NamaLoker', '=', $id)->first();
            return $kode->HrgLoker;
        } else if ($kode=="Tools") {
            $kode = Seragam::where('NamaTools', '=', $id)->first();
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
        $data1 = TransaksiKeluar::find($id);
        // $hasil = [];

        // $result = {"Tgl_Kembali" => $data->Tgl_Kembali, "data2" => $data2};
        // if(($data1) && ($data2)){


        // return response()->json($result);

        // } else {

        // }
        return $data1->Tgl_Pinjam;
    }
    public function ambilData2($id){
        $data2 = TransaksiKeluar::find($id);
        return $data2->Tgl_Kembali;
    }
    public function ambilData3($id){
        $data3 = TransaksiKeluar::find($id);
        return $data3->NamaKaryawan;
    }
    public function ambilData4($id){
        $data4 = TransaksiKeluar::find($id);
        return $data4->NamaDepartemen;
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
