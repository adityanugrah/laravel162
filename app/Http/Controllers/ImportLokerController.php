<?php

namespace App\Http\Controllers;
use App\Loker;
use Illuminate\Http\Request;
use Excel;
use PDF;

class ImportLokerController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function pdfLoker () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $loker = Loker::all();
        $pdf = PDF::loadView('loker.cetak', ['lokers'=>$loker])->setPaper('a4', 'landscape');
        return $pdf->download('Loker.pdf');
    }

    public function downloadLoker(Request $request, $type)
    {
        $data = Loker::get()->toArray();
        return Excel::create('Laporan Loker', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importLoker(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                            'KodeLoker' => $v['kodeloker'],
                            'NamaLoker' => $v['namaloker'],
                            'Jeniskar' => $v['jeniskaryawan'],
                            'Keterangan' => $v['keterangan'],
                            'HrgLoker' => $v['hrgloker'],
                            'StokLoker' => $v['stokloker'],
                            'StokMasuk' => $v['stokmasuk'],
                            'StokKeluar' => $v['stokkeluar'],
                            'StokAkhir' => $v['stokakhir'],
                            'Picture' => $v['picture']];
                        }
                    }
                }
                
                if(!empty($insert)){
                    Loker::insert($insert);
                    return back()->with('pesan_sukses', 'Data berhasil di import.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
