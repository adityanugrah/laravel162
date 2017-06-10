<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('KodeSupplier')->get(); 
        return view('supplier.index', compact('suppliers'));
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
            $supplier = new Supplier;
            $supplier->KodeSupplier  = $request->KodeSupplier;
            $supplier->NamaSupplier  = $request->NamaSupplier;
            $supplier->Keterangan    = $request->Keterangan;   
            $supplier->Alamat        = $request->Alamat;   
            $supplier->Telepon       = $request->Telepon;   
            $supplier->KotaSupplier  = $request->KotaSupplier;  

            $photo=$request->file('Picture');
            $destination=base_path().'/public/img/supplier';
            $filename=time().'.'.$photo->getClientOriginalExtension();          
            $photo->move($destination,$filename);           
            $supplier['Picture']=$filename; 
        
            $supplier->save();
            return redirect('/supplier')->with('pesan_sukses', 'Data supplier has been saved.');
        
            if ($validator -> fails()) {
                    return redirect('/supplier')->withErrors($validator)->withInput();
            }

        } 
        catch (Exception $e) {
            return redirect('/supplier')->with('pesan_gagal', $e->getMessage());
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
        $supplier = Supplier::where('KodeSupplier', $id)->first();
        return view('supplier.show', compact('supplier'));
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
            $supplier = Supplier::find($id);
            $supplier->KodeSupplier  = $request->KodeSupplier;
            $supplier->NamaSupplier  = $request->NamaSupplier;
            $supplier->Keterangan    = $request->Keterangan;   
            $supplier->Alamat        = $request->Alamat;   
            $supplier->Telepon       = $request->Telepon;   
            $supplier->KotaSupplier  = $request->KotaSupplier;   

            if ($request->hasFile('Picture')) {
                $img = Supplier::find($id);
                $path = base_path().'/public/img/supplier/' .$img->Picture;
                
                if (file_exists($path)) {
                    unlink($path);
                }
                
                $photo=$request->file('Picture');
                $destination=base_path().'/public/img/supplier/';
                $filename=time().'.'.$photo->getClientOriginalExtension();              
                $photo->move($destination,$filename);               
                $supplier['Picture']=$filename;
            }

            $supplier->save();
            return redirect('/supplier')->with('pesan_sukses', 'Data berhasil.');

            if ($validator -> fails()) {
                    return redirect('/supplier')->withErrors($validator)->withInput();
            }
        } catch (Exception $e) {
            return redirect('/supplier')->with('pesan_gagal', $e->getMessage());
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
            
            $photo=Supplier::find($id);
            $location=base_path().'/public/img/supplier/' .$photo->Picture;
            $cc = unlink($location);
            
            Supplier::find($id)->delete();          
            return redirect('/supplier')->with('Data supplier successfully removed .');
        }
        catch(Exception $e) {
            return redirect('/supplier')->with('pesan_gagal', $e->getMessage());
        }
    }
}
