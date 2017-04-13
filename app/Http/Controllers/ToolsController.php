<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools;
use Validator;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tool = Tools::orderBy('KodeTools')->get(); 
        return view('tools.index', compact('tool'));
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
            $tools = new Tools;
            $tools->KodeTools   = $request->KodeTools;
            $tools->NamaTools   = $request->NamaTools;
            $tools->Keterangan  = $request->Keterangan;
            $tools->StokTools   = $request->StokTools;
            $tools->StokAkhir   = $tools->StokTools;     

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/tools';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $tools['Picture']=$filename; 
        
            $tools->save();
            return redirect('databarang/tools')->with('pesan_sukses', 'Data tools has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('databarang/tools')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('databarang/tools')->with('pesan_gagal', $e->getMessage());
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
        $tools = Tools::where('KodeTools', $id)->first();
        return view('tools.show', compact('tools'));
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
            $tools = Tools::find($id);
            $tools->KodeTools  = $request->KodeTools;
            $tools->NamaTools  = $request->NamaTools;
            $tools->Keterangan  = $request->Keterangan;  
            $tools->StokAkhir   = $request->StokAkhir;
            $tools->StokTools = ($tools->StokAkhir+$tools->StokKeluar)-$tools->StokMasuk;

            if ($request->hasFile('Picture')) {
                $img = Tools::find($id);
                $path = base_path().'/public/img/tools/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/tools/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $tools['Picture']=$filename;
            }

            $tools->save();
            return redirect('databarang/tools')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('databarang/tools')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('databarang/tools')->with('pesan_gagal', $e->getMessage());
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
            
            $photo=Tools::find($id);
            $location=base_path().'/public/img/tools/' .$photo->Picture;
            $cc = unlink($location);
            
            Tools::find($id)->delete();          
            return redirect('databarang/tools')->with('pesan_sukses', 'Data tools successfully removed .');
        }
        catch(Exception $e) {
            return redirect('databarang/tools')->with('pesan_gagal', $e->getMessage());
        }
    }
}
