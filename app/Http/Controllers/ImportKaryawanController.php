<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Excel;
use PDF;

class ImportKaryawanController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function pdfKaryawan () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $Karyawan = Karyawan::all();
        $pdf = PDF::loadView('karyawan.cetak', ['kar'=>$Karyawan])->setPaper('a4', 'landscape');
        return $pdf->download('Karyawan.pdf');
    }

   public function downloadKaryawan(Request $request, $type)
    {
        $data = Karyawan::get()->toArray();
        return Excel::create('Laporan Karyawan', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importKaryawan(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = [
                            'KodeKaryawan'  => $v['kodekaryawan'],
                            'NamaKaryawan'  => $v['namakaryawan'],
                            'Status' 		=> $v['status'],
                            'DepartemenKar' => $v['departemenkar'],
                            'AlamatKaryawan'=> $v['alamatkaryawan'],
                            'Telepon'       => $v['telepon'],
                            'Picture'       => $v['picture'],
                            'email'         => $v['email'],
                            'password' 		=> bcrypt($v['password'])
                            ];
                        }
                    }
                }

                if(!empty($insert)){
                    Karyawan::insert($insert);
                    return back()->with('pesan_sukses', 'Data berhasil di record.');
                }

            }

        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
