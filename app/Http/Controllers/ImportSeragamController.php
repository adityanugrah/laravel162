<?php

namespace App\Http\Controllers;
use App\Seragam;
use Illuminate\Http\Request;
use Excel;

class ImportSeragamController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Seragam::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importSeragam(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                            'KodeSeragam' => $v['kodeseragam'], 
                            'NamaSeragam' => $v['namaseragam'],
                            'jenisKar' => $v['jeniskaryawan'], 
                            'Status' => $v['status'], 
                            'Ukuran' => $v['ukuran'], 
                            'Keterangan' => $v['keterangan'], 
                            'HrgSeragam' => $v['hrgseragam'], 
                            'StokSeragam' => $v['stokseragam'], 
                            'StokMasuk' => $v['stokmasuk'], 
                            'StokKeluar' => $v['stokkeluar'], 
                            'StokAkhir' => $v['stokakhir'], 
                            'Picture' => $v['picture']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Seragam::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
