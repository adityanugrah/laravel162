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
        $seragams = Seragam::orderBy('kodeseragam')->get(); 
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
            $seragam->kodeseragam = $request->kodeseragam;
            $seragam->namaseragam = $request->namaseragam;
            $seragam->keterangan  = $request->keterangan;   

            $photo=$request->file('picture');
            $destination=base_path().'/public/img/seragam';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $seragam['picture']=$filename; 
        
            $seragam->save();
            return redirect('seragam')->with('pesan_sukses', 'Data seragam has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('seragam')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('seragam')->with('pesan_gagal', $e->getMessage());
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
        $seragam = Seragam::where('kodeseragam', $id)->first();
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
            $seragam->kodeseragam = $request->kodeseragam;
            $seragam->namaseragam = $request->namaseragam;
            $seragam->keterangan  = $request->keterangan;

            // if ($request->hasFile('picture')) {
            //     $seragam=Seragam::find($id);
            //     $location=public_path().'/img/seragam/' .$seragam->picture;
            //     $cc = unlink($location);

            //     $imageName = time().'.'.$request->picture->getClientOriginalExtension();
            //     $request->picture->move(public_path('img/seragam'), $imageName);
            //     $seragam->picture = $imageName;
            // } else {
            //     $seragam->picture = "picture.jpg";
            // }

            $seragam->save();
            return redirect('seragam')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('seragam')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('seragam')->with('pesan_gagal', $e->getMessage());
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
            
            $seragam=Seragam::find($id);
            $location=public_path().'/img/seragam/' .$seragam->picture;
            $cc = unlink($location);

            Seragam::find($id)->delete();          
            return redirect('seragam')->with('pesan_sukses', 'Data Seragam successfully removed .');
        }
        catch(Exception $e) {
            return redirect('seragam')->with('pesan_gagal', $e->getMessage());
        }
    }
}
