<?php

namespace App\Http\Controllers;
use App\Supplier;
use Illuminate\Http\Request;
use Excel;
use PDF;

class ImportSupplierController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }

    public function pdfSupplier () {
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        
        $supplier = Supplier::all();
        $pdf = PDF::loadView('supplier.cetak', ['suppliers'=>$supplier])->setPaper('a4', 'landscape');
        return $pdf->download('Supplier.pdf');
    }

    public function downloadSupplier(Request $request, $type)
    {
        $data = Supplier::get()->toArray();
        return Excel::create('Laporan Supplier', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importSupplier(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['KodeSupplier' => $v['kodesupplier'], 'NamaSupplier' => $v['namasupplier'],'Keterangan' => $v['keterangan'], 'Alamat' => $v['alamat'], 'KotaSupplier' => $v['kotasupplier'],'Picture' => $v['picture']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Supplier::insert($insert);
                    return back()->with('pesan_sukses', 'Data berhasil di record.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}
