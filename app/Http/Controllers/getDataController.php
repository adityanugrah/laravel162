<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;

use App\Seragam;
use App\Preused;
use App\Loker;
use App\Tools;

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


    public function ambilNamaBarang($id,$kode){

        if($kode=="Seragam") {
            $kode = Seragam::find($id);
            return $kode->NamaSeragam;
        } else if ($kode=="Preused") {
            $kode = Preused::find($id);
            return $kode->NamaPreused; 
        } else if ($kode=="Loker") {
            $kode = Loker::find($id);
            return $kode->NamaLoker;
        } else if ($kode=="Tools") {
            $kode = Tools::find($id);
            return $kode->NamaTools;
        } else {
            $kode = "Tidak Ada Data";
            return $kode;
        }
        
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
