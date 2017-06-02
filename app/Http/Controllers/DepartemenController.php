<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use Validator;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $dep = Departemen::orderBy('KodeDepartemen')->get(); 
        return view('departemen.index', compact('dep'));
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
            $dep = new Departemen;
            $dep->KodeDepartemen  = $request->KodeDepartemen;
            $dep->NamaDepartemen  = $request->NamaDepartemen;
            $dep->Keterangan      = $request->Keterangan;
        
            $dep->save();
            return redirect('/departemen')->with('pesan_sukses', 'Data departemen has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('/departemen')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('/departemen')->with('pesan_gagal', $e->getMessage());
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
        $dep = Departemen::where('KodeDepartemen', $id)->first();
        return view('departemen.show', compact('dep'));
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
            $dep = Departemen::find($id);
            $dep->KodeDepartemen  = $request->KodeDepartemen;
            $dep->NamaDepartemen  = $request->NamaDepartemen;
            $dep->Keterangan      = $request->Keterangan;
        
            $dep->save();

            return redirect('/departemen')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('/departemen')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('/departemen')->with('pesan_gagal', $e->getMessage());
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
            Departemen::find($id)->delete();          
            return redirect('/departemen')->with('pesan_sukses', 'Data departemen successfully removed .');
        }
        catch(Exception $e) {
            return redirect('/departemen')->with('pesan_gagal', $e->getMessage());
        }
    }
}
