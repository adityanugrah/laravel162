<?php

namespace App\Http\Controllers;

use App\Departemen;
use Illuminate\Http\Request;
use Excel;

class ImportDepartemenController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Loker::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
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
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
