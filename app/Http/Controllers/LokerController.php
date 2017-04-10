<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loker;
use Validator;


class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokers = Loker::orderBy('KodeLoker')->get(); 
        return view('loker.index', compact('lokers'));
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
            $loker = new Loker;
            $loker->KodeLoker   = $request->KodeLoker;
            $loker->NamaLoker   = $request->NamaLoker;
            $loker->JenisKar    = $request->JenisKar;
            $loker->Keterangan  = $request->Keterangan; 
            $loker->StokLoker   = $request->StokLoker;
            $loker->StokAkhir   = $loker->StokLoker; 

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/loker';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $loker['Picture']=$filename; 
        
            $loker->save();
            return redirect('databarang/loker')->with('pesan_sukses', 'Data loker has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('databarang/loker')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('databarang/loker')->with('pesan_gagal', $e->getMessage());
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
        $loker = Loker::where('KodeLoker', $id)->first();
        return view('loker.show', compact('loker'));
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
            $loker = Loker::find($id);
            $loker->KodeLoker   = $request->KodeLoker;
            $loker->NamaLoker   = $request->NamaLoker;
            $loker->JenisKar    = $request->JenisKar;
            $loker->Keterangan  = $request->Keterangan;
            $loker->StokLoker   = $request->StokLoker;
            $loker->StokAkhir   = $loker->StokLoker;    

            if ($request->hasFile('Picture')) {
                $img = Loker::find($id);
                $path = base_path().'/public/img/loker/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/loker/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $loker['Picture']=$filename;
            }

            $loker->save();
            return redirect('databarang/loker')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('databarang/loker')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('databarang/loker')->with('pesan_gagal', $e->getMessage());
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
            
            $photo=Loker::find($id);
            $location=base_path().'/public/img/loker/' .$photo->Picture;
            $cc = unlink($location);
            
            Loker::find($id)->delete();          
            return redirect('databarang/loker')->with('pesan_sukses', 'Data loker successfully removed .');
        }
        catch(Exception $e) {
            return redirect('databarang/loker')->with('pesan_gagal', $e->getMessage());
        }
    }
}
