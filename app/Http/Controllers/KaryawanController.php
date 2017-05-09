<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Departemen;
use Validator;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deps = Departemen::orderBy('KodeDepartemen')->get();
        $kar  = Karyawan::orderBy('KodeKaryawan')->get(); 
        return view('karyawan.index', compact('kar','deps'));
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
            $kar = new Karyawan;
            $kar->KodeKaryawan  = $request->KodeKaryawan;
            $kar->NamaKaryawan  = $request->NamaKaryawan;
            $kar->Status        = $request->Status;
            $kar->DepartemenKar = $request->DepartemenKar;

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/karyawan';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $kar['Picture']=$filename; 
        
            $kar->save();
            return redirect('/karyawan')->with('pesan_sukses', 'Data karyawan has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('/karyawan')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('/karyawan')->with('pesan_gagal', $e->getMessage());
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
        $kar = Karyawan::where('KodeKaryawan', $id)->first();
        $deps = Departemen::orderBy('KodeDepartemen')->get();
        return view('karyawan.show', compact('kar','deps'));
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
            $kar = Karyawan::find($id);
            $kar->KodeKaryawan  = $request->KodeKaryawan;
            $kar->NamaKaryawan  = $request->NamaKaryawan;
            $kar->Status        = $request->Status;
            $kar->DepartemenKar = $request->DepartemenKar;

            if ($request->hasFile('Picture')) {
                $img = Karyawan::find($id);
                $path = base_path().'/public/img/karyawan/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/karyawan/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $kar['Picture']=$filename;
            }

            $kar->save();
            return redirect('/karyawan')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('/karyawan')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('/karyawan')->with('pesan_gagal', $e->getMessage());
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
            $photo=Karyawan::find($id);
            $location=base_path().'/public/img/karyawan/' .$photo->Picture;
            $cc = unlink($location);

            Karyawan::find($id)->delete();          
            return redirect('/karyawan')->with('pesan_sukses', 'Data karyawan successfully removed .');
        }
        catch(Exception $e) {
            return redirect('/karyawan')->with('pesan_gagal', $e->getMessage());
        }
    }
}
