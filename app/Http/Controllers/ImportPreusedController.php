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
                            $insert[] = [
                            'KodePreused' => $v['kodepreused'], 
                            'NamaPreused' => $v['namapreused'],
                            'jenisKar' => $v['jeniskaryawan'], 
                            'Status' => $v['status'], 
                            'Ukuran' => $v['ukuran'], 
                            'Keterangan' => $v['keterangan'], 
                            'HrgPreused' => $v['hrgpreused'],
                            'StokPreused' => $v['stokpreused'], 
                            'StokMasuk' => $v['stokmasuk'], 
                            'StokKeluar' => $v['stokkeluar'], 
                            'StokAkhir' => $v['stokakhir'], 
                            'Picture' => $v['picture']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Preused::insert($insert);
                    return back()->with('pesan_sukses', 'Data berhasil di record.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
