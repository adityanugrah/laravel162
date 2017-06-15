<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransaksiKeluar;
use App\TransaksiKembali;
use App\DetailKeluar;
use App\DetailKembali;
use App\Supplier;
use App\Seragam;
use App\Preused;
use App\Tools;
use App\Loker;
use App\Karyawan;
use App\Departemen;

class TransaksiKembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kembali = TransaksiKembali::orderBy('KodeKembali')->get(); 
        $detail = DetailKeluar::orderBy('KodeKeluar')->get(); 
        return view('transaksikembali.index', compact('kembali','detail'));
    }

    public function ajaxNamaBrg(Request $request){
        if ($request->ajax()) {
            $datas = $request->all();
            $jenisBarang = $datas['JenisBrg'];
            $kodeKeluar = $datas['kodeKeluar'];
            $namaBarang = DetailKeluar::where('KodeKeluar',$kodeKeluar)
                            ->where('JenisBrg',$jenisBarang)->pluck('NamaBrg');
                            if(count($namaBarang) > 0){
                                return response()->json($namaBarang);
                            } else {
                                return response()->json(['message' => 'Data notfound'], 404);
                            }
        }
        return view('transaksikembali.index',compact('namaBarang'));
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
        if($request->aksi==0)
        {
            session_start();
            $Kondisi=false;

            if (isset($_SESSION["ok"])  ) {
                for ($i=0;$i<=$_SESSION['ok'];$i++) {
                    if( ($_SESSION['kembali'][$i][3] == $request->Tgl_Pinjam) &&
                        ($_SESSION['kembali'][$i][4] == $request->Tgl_Kembali) &&
                        ($_SESSION['kembali'][$i][1] == $request->NamaKaryawan) &&
                        ($_SESSION['kembali'][$i][6] == $request->NamaBrg) 
                         ){
                        $_SESSION['kembali'][$i][7]= $_SESSION['kembali'][$i][7]+$request->JumlahBrg;
                        $Kondisi=true;
                    }
                }
            }
            
            if($Kondisi==false) {
                if (!isset($_SESSION["ok"])){
                    $_SESSION["ok"]=0;
                } else {
                    $_SESSION["ok"]++;
                }

                $_SESSION['kembali'][$_SESSION["ok"]] = array(
                    $request->transaksikembali,               
                    $request->Tgl_Pinjam,
                    $request->Tgl_Kembali,
                    $request->Tgl_Pengembalian,
                    $request->NamaKaryawan,
                    $request->NamaDepartemen,
                    $request->JenisBrg,
                    $request->NamaBarang,
                    $request->Size,
                    $request->JumlahBrg
                );
            }                
                return redirect('transaksi/transaksikembali');                
            } else if($request->aksi==2) {
                session_start();
                session_destroy();
                return redirect('transaksi/transaksikembali');
            } else if($request->aksi==3) {
                session_start();
                unset($_SESSION['kembali'][$request->idelete]);
                $_SESSION['ok']=$_SESSION['ok']-1;
                $_SESSION['kembali']=array_values($_SESSION['kembali']);  
                return redirect('transaksi/transaksikembali');
            } else {
                try {
                    session_start();

                    for ($i=0;$i<=$_SESSION['ok'];$i++) {
                        $kembali = new TransaksiKembali;
                        $kembali->KodeKembali       = $_SESSION['kembali'][$i][0];
                        $kembali->Tgl_Pinjam        = $_SESSION['kembali'][$i][1]; 
                        $kembali->Tgl_Kembali       = $_SESSION['kembali'][$i][2]; 
                        $kembali->Tgl_Pengembalian  = $_SESSION['kembali'][$i][3];
                        $kembali->NamaKaryawan      = $_SESSION['kembali'][$i][4];
                        $kembali->NamaDepartemen    = $_SESSION['kembali'][$i][5];

                        $detailkembali = new DetailKembali;
                        $detailkembali->KodeKembali = $_SESSION['kembali'][$i][0]; 
                        $detailkembali->JenisBarang = $_SESSION['kembali'][$i][6];
                        $detailkembali->NamaBarang  = $_SESSION['kembali'][$i][7];   
                        $detailkembali->SizeBarang  = $_SESSION['kembali'][$i][8];
                        $detailkembali->JmlBarang   = $_SESSION['kembali'][$i][9];
                        $detailkembali->save();

                        // DetailKeluar::where('kodeKeluar',$_SESSION['kembali'][$i][0] )
                        //             ->where('NamaBrg', $_SESSION['kembali'][$i][7])->delete();

                        if($_SESSION['kembali'][$i][6]=="Seragam") {
                            $Preused = Preused::where('NamaPreused',$_SESSION['kembali'][$i][7])->first();
                            $Preused->StokMasuk = $Preused->StokMasuk+$_SESSION['kembali'][$i][9];
                            $Preused->StokAkhir = $Preused->StokMasuk+$Preused->StokPreused-$Preused->StokKeluar;
                            $Preused->save();
                        } else if ($_SESSION['kembali'][$i][6]=="Preused") {
                            $Preused = Preused::where('NamaPreused',$_SESSION['kembali'][$i][7])->first();
                            $Preused->StokMasuk = $Preused->StokMasuk+$_SESSION['kembali'][$i][9];
                            $Preused->StokAkhir = $Preused->StokMasuk+$Preused->StokPreused-$Preused->StokKeluar;
                            $Preused->save();
                        } else if ($_SESSION['kembali'][$i][6]=="Loker") {
                            $Loker = Loker::where('NamaLoker',$_SESSION['kembali'][$i][7])->first();
                            $Loker->StokMasuk = $Loker->StokMasuk+$_SESSION['kembali'][$i][9];
                            $Loker->StokAkhir = $Loker->StokMasuk+$Loker->StokLoker-$Loker->StokKeluar;
                            $Loker->save();
                        } else if ($_SESSION['kembali'][$i][6]=="Tools") {
                            $Tools = Tools::where('NamaTools',$_SESSION['kembali'][$i][7])->first();
                            $Tools->StokMasuk = $Tools->StokMasuk+$_SESSION['kembali'][$i][9];
                            $Tools->StokAkhir = $Tools->StokMasuk+$Tools->StokTools-$Tools->StokKeluar;
                            $Tools->save();
                        } else {
                            $kembali = "Tidak Ada Data";   
                        }
                    }
                    $kembali->save(); 
                    session_destroy();
                    return redirect('transaksi/transaksikembali')->with('pesan_sukses', 'Transaksi saved.');
                } catch (Exception $e) {
                    return redirect('transaksi/transaksikembali')->with('pesan_gagal', $e->getMessage());
                }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
