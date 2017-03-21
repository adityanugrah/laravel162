<?php

namespace App\Http\Controllers;
use App\Preused;
use Illuminate\Http\Request;
use Excel;

class ImportPreusedController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Preused::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importPreused(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['KodePreused' => $v['kodepreused'], 'NamaPreused' => $v['namapreused'],'Keterangan' => $v['keterangan'], 'StokPreused' => $v['stokpreused'], 'Picture' => $v['picture']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Preused::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}