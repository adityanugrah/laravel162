<?php

namespace App\Http\Controllers;

use App\Departemen;
use Illuminate\Http\Request;
use Excel;
use PDF;

class ImportDepartemenController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function pdfDepartemen () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $departemen = Departemen::all();
        //dd($departemen);
        // $pdf = PDF::loadView('departemen.tes');
        $pdf = PDF::loadView('departemen.tes', ['dep'=>$departemen]);
        return $pdf->download('departemen.pdf');
    }

    public function downloadDepartemen(Request $request, $type)
    {
        $data = Departemen::get()->toArray();
        return Excel::create('Laporan Departemen', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importDepartemen(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                            'KodeDepartemen'  => $v['kodedepartemen'],
                            'NamaDepartemen'  => $v['namadepartemen'],
                            'Keterangan' 	  => $v['keterangan']];
                        }
                    }
                }
                
                if(!empty($insert)){
                    Departemen::insert($insert);
                    return back()->with('pesan_sukses', 'Data berhasil di record.');
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
