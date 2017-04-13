<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seragam;
use Validator;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seragams = Seragam::orderBy('KodeSeragam')->get(); 
        return view('seragam.index', compact('seragams'));
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
            $seragam->JenisKar    = $request->JenisKar;
            $seragam->Status      = $request->Status;
            $seragam->Ukuran      = $request->Ukuran;
            $seragam->Keterangan  = $request->Keterangan;
            $seragam->StokSeragam = $request->StokSeragam;
            $seragam->StokAkhir   = $request->StokSeragam;

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
        $seragam = Seragam::where('KodeSeragam', $id)->first();
        return view('seragam.show', compact('seragam'));
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
        try {
            $seragam = Seragam::find($id);
            $seragam->KodeSeragam = $request->KodeSeragam;
            $seragam->NamaSeragam = $request->NamaSeragam;
            $seragam->JenisKar    = $request->JenisKar;
            $seragam->Status      = $request->Status;
            $seragam->Ukuran      = $request->Ukuran;
            $seragam->Keterangan  = $request->Keterangan; 
            $seragam->StokAkhir   = $request->StokAkhir;
            $seragam->StokSeragam = ($seragam->StokAkhir+$seragam->StokKeluar)-$seragam->StokMasuk;

            if ($request->hasFile('Picture')) {
                $img = Seragam::find($id);
                $path = base_path().'/public/img/seragam/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/seragam/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $seragam['Picture']=$filename;
            }

            $seragam->save();
            return redirect('databarang/seragam')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('databarang/seragam')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('databarang/seragam')->with('pesan_gagal', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
            $photo=Seragam::find($id);
            $location=base_path().'/public/img/seragam/' .$photo->Picture;
            $cc = unlink($location);
            
            Seragam::find($id)->delete();          
            return redirect('databarang/seragam')->with('pesan_sukses', 'Data seragam successfully removed .');
        }
        catch(Exception $e) {
            return redirect('databarang/seragam')->with('pesan_gagal', $e->getMessage());
        }
    }
}
