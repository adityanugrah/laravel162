<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preused;
use Validator;

class PreusedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preuseds = Preused::orderBy('KodePreused')->get(); 
        return view('preused.index', compact('preuseds'));
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
            $preused = new Preused;
            $preused->KodePreused = $request->KodePreused;
            $preused->NamaPreused = $request->NamaPreused;
            $preused->JenisKar    = $request->JenisKar;
            $preused->Status      = $request->Status;
            $preused->Ukuran      = $request->Ukuran;
            $preused->Keterangan  = $request->Keterangan;
            $preused->StokPreused = $request->StokPreused;
            $preused->StokAkhir   = $preused->StokPreused;  

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/preused';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $preused['Picture']=$filename; 
        
            $preused->save();
            return redirect('databarang/preused')->with('pesan_sukses', 'Data preused has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('databarang/preused')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('databarang/preused')->with('pesan_gagal', $e->getMessage());
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
        $preused = Preused::where('KodePreused', $id)->first();
        return view('preused.show', compact('preused'));
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
            $preused = Preused::find($id);
            $preused->KodePreused = $request->KodePreused;
            $preused->NamaPreused = $request->NamaPreused;
            $preused->JenisKar    = $request->JenisKar;
            $preused->Status      = $request->Status;
            $preused->Ukuran      = $request->Ukuran;
            $preused->Keterangan  = $request->Keterangan;
            $preused->StokPreused = $request->StokPreused;
            $preused->StokAkhir   = $preused->StokPreused;      

            if ($request->hasFile('Picture')) {
                $img = Preused::find($id);
                $path = base_path().'/public/img/preused/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/preused/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $preused['Picture']=$filename;
            }

            $preused->save();
            return redirect('databarang/preused')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('databarang/preused')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('databarang/preused')->with('pesan_gagal', $e->getMessage());
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
            
            $photo=Preused::find($id);
            $location=base_path().'/public/img/preused/' .$photo->Picture;
            $cc = unlink($location);
            
            Preused::find($id)->delete();          
            return redirect('databarang/preused')->with('pesan_sukses', 'Data preused successfully removed .');
        }
        catch(Exception $e) {
            return redirect('databarang/preused')->with('pesan_gagal', $e->getMessage());
        }
    }
}
