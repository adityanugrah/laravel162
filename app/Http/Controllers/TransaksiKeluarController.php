<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TransaksiKeluar;
use App\DetailKeluar;
use App\Supplier;
use App\Seragam;
use App\Preused;
use App\Tools;
use App\Loker;
use Validator;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluar = TransaksiKeluar::orderBy('KodeKeluar')->get(); 
        return view('transaksikeluar.index', compact('keluar'));
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

            if (isset($_SESSION["ada"])  ) {
                for ($i=0;$i<=$_SESSION['ada'];$i++) {
                    if( ($_SESSION['keluar'][$i][1] == $request->Tgl_Pinjam) &&
                        ($_SESSION['keluar'][$i][2] == $request->Tgl_Kembali) &&
                        ($_SESSION['keluar'][$i][3] == $request->NamaKaryawan) &&
                        ($_SESSION['keluar'][$i][5] == $request->NamaBrg) 
                         ){
                        $_SESSION['keluar'][$i][6]= $_SESSION['keluar'][$i][6]+$request->JumlahBrg;
                        $Kondisi=true;
                    }
                }
            }
            
            if($Kondisi==false) {
                if (!isset($_SESSION["ada"])){
                    $_SESSION["ada"]=0;
                } else {
                    $_SESSION["ada"]++;
                }

                $_SESSION['keluar'][$_SESSION["ada"]] = array(
                    $request->KodeKeluar,
                    $request->Tgl_Pinjam,
                    $request->Tgl_Kembali,
                    $request->NamaKaryawan,
                    $request->JenisBrg,
                    $request->NamaBrg,
                    $request->JumlahBrg);
            }
                return redirect('transaksi/transaksikeluar');
            } else if($request->aksi==2) {
                session_start();
                session_destroy();
                return redirect('transaksi/transaksikeluar');
            } else if($request->aksi==3) {
                session_start();
                unset($_SESSION['keluar'][$request->idelete]);
                $_SESSION['ada']=$_SESSION['ada']-1;
                $_SESSION['keluar']=array_values($_SESSION['keluar']);  
                return redirect('transaksi/transaksikeluar');
            } else {
                try {
                    session_start();

                    for ($i=0;$i<=$_SESSION['ada'];$i++) {
                        $keluar = new TransaksiKeluar;
                        $keluar->KodeKeluar     = $_SESSION['keluar'][$i][0];
                        $keluar->Tgl_Pinjam     = $_SESSION['keluar'][$i][1];
                        $keluar->Tgl_Kembali    = $_SESSION['keluar'][$i][2];

                        $detailkeluar = new DetailKeluar;  
                        $detailkeluar->KodeKeluar     = $_SESSION['keluar'][$i][0];
                        $detailkeluar->NamaKaryawan   = $_SESSION['keluar'][$i][3];  
                        $detailkeluar->JenisBrg       = $_SESSION['keluar'][$i][4];
                        $detailkeluar->NamaBrg        = $_SESSION['keluar'][$i][5];   
                        $detailkeluar->JumlahBrg      = $_SESSION['keluar'][$i][6];
                        $detailkeluar->save();

                        if($_SESSION['keluar'][$i][4]=="Seragam") {
                            $seragam = Seragam::where('NamaSeragam',$_SESSION['keluar'][$i][5])->first();
                            $seragam->StokKeluar = $seragam->StokKeluar+$_SESSION['keluar'][$i][6];
                            $seragam->StokAkhir  = $seragam->StokMasuk+$seragam->StokSeragam-$seragam->StokKeluar;
                            $seragam->save();
                        } else if ($_SESSION['keluar'][$i][4]=="Preused") {
                            $Preused = Preused::where('NamaPreused',$_SESSION['keluar'][$i][5])->first();
                            $Preused->StokMasuk = $Preused->StokMasuk+$_SESSION['keluar'][$i][6];
                            $Preused->StokAkhir = $Preused->StokMasuk+$Preused->StokPreused-$Preused->StokKeluar;
                            $Preused->save();
                        } else if ($_SESSION['keluar'][$i][4]=="Loker") {
                            $Loker = Loker::where('NamaLoker',$_SESSION['keluar'][$i][5])->first();
                            $Loker->StokMasuk = $Loker->StokMasuk+$_SESSION['keluar'][$i][6];
                            $Loker->StokAkhir = $Loker->StokMasuk+$Loker->StokLoker-$Loker->StokKeluar;
                            $Loker->save();
                        } else if ($_SESSION['keluar'][$i][4]=="Tools") {
                            $Tools = Tools::where('NamaTools',$_SESSION['keluar'][$i][5])->first();
                            $Tools->StokMasuk = $Tools->StokMasuk+$_SESSION['keluar'][$i][6];
                            $Tools->StokAkhir = $Tools->StokMasuk+$Tools->StokTools-$Tools->StokKeluar;
                            $Tools->save();
                        } else {
                            $data = "Tidak Ada Data";   
                        }

                    }

                    $keluar->save(); 
                    session_destroy();
                    return redirect('transaksi/transaksikeluar')->with('pesan_sukses', 'Transaksi saved.');

                } catch (Exception $e) {
                    return redirect('transaksi/transaksikeluar')->with('pesan_gagal', $e->getMessage());
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
