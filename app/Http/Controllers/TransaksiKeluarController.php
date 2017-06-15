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
use App\Karyawan;
use App\Departemen;
use Validator;
use Mail;
use Session;

class TransaksiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kar = Karyawan::orderBy('KodeKaryawan')->get(); 
        $dep = Departemen::orderBy('KodeDepartemen')->get(); 
        $keluar = TransaksiKeluar::orderBy('KodeKeluar')->get(); 
        $detail = DetailKeluar::orderBy('KodeKeluar')->get(); 
        return view('transaksikeluar.index', compact('keluar','kar','dep','detail'));
    }

    public function namabarang($id){
        if($id=="Seragam") {
            $data=Seragam::orderBy('NamaSeragam')->get();
        } else if ($id=="Preused") {
            $data=Preused::orderBy('NamaPreused')->get(); 
        } else if ($id=="Loker") {
            $data=Loker::orderBy('NamaLoker')->get(); 
        } else if ($id=="Tools") {
            $data=Tools::orderBy('NamaTools')->get(); 
        } else {
            $data = "Tidak Ada Data";
        }
        return view('transaksikeluar.coba',compact('data','id'));
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
                    if( ($_SESSION['keluar'][$i][3] == $request->Tgl_Pinjam) &&
                        ($_SESSION['keluar'][$i][4] == $request->Tgl_Kembali) &&
                        ($_SESSION['keluar'][$i][1] == $request->NamaKaryawan) &&
                        ($_SESSION['keluar'][$i][6] == $request->NamaBrg) 
                         ){
                        $_SESSION['keluar'][$i][7]= $_SESSION['keluar'][$i][7]+$request->JumlahBrg;
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
                    $request->NamaKaryawan,
                    $request->NamaDepartemen,
                    $request->Tgl_Pinjam,
                    $request->Tgl_Kembali,
                    $request->JenisBrg,
                    $request->NamaBrg,
                    $request->JumlahBrg,
                    $request->Size
                );
            }
                // Session::put('Tgl_Kembali','$request->Tgl_Kembali');
                
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
                        $keluar->NamaKaryawan   = $_SESSION['keluar'][$i][1]; 
                        $keluar->NamaDepartemen = $_SESSION['keluar'][$i][2]; 
                        $keluar->Tgl_Pinjam     = $_SESSION['keluar'][$i][3];
                        $keluar->Tgl_Kembali    = $_SESSION['keluar'][$i][4];

                        $detailkeluar = new DetailKeluar;
                        $detailkeluar->KodeKeluar     = $_SESSION['keluar'][$i][0]; 
                        $detailkeluar->JenisBrg       = $_SESSION['keluar'][$i][5];
                        $detailkeluar->NamaBrg        = $_SESSION['keluar'][$i][6];   
                        $detailkeluar->JumlahBrg      = $_SESSION['keluar'][$i][7];
                        $detailkeluar->Size           = $_SESSION['keluar'][$i][8];
                        $detailkeluar->save();
                        
                        if($_SESSION['keluar'][$i][5]=="Seragam") {
                            $seragam = Seragam::where('NamaSeragam',$_SESSION['keluar'][$i][6])->first();
                            $seragam->StokKeluar = $seragam->StokKeluar+$_SESSION['keluar'][$i][7];
                            $seragam->StokAkhir  = $seragam->StokMasuk+$seragam->StokSeragam-$seragam->StokKeluar;
                            $seragam->save();
                            if ($seragam->StokAkhir <= 5) { 
                                $_SESSION['NamaBrg'] = $detailkeluar->NamaBrg;                               
                                Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message) {
                                    $message->to('burgerkillselalu@gmail.com', 'Restok') -> subject('Penting');
                                    $message->from('burgerkillselalu@gmail.com', 'Bitfumes');
                                });
                            }
                        } else if ($_SESSION['keluar'][$i][5]=="Preused") {
                            $Preused = Preused::where('NamaPreused',$_SESSION['keluar'][$i][6])->first();
                            $Preused->StokKeluar = $Preused->StokKeluar+$_SESSION['keluar'][$i][7];
                            $Preused->StokAkhir = $Preused->StokMasuk+$Preused->StokPreused-$Preused->StokKeluar;
                            $Preused->save();
                            if ($Preused->StokAkhir <= 5) {                                
                                Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message) {
                                    $message->to('burgerkillselalu@gmail.com', 'Restok') -> subject('Penting');
                                    $message->from('burgerkillselalu@gmail.com', 'Bitfumes');
                                });
                            }
                        } else if ($_SESSION['keluar'][$i][5]=="Loker") {
                            $Loker = Loker::where('NamaLoker',$_SESSION['keluar'][$i][6])->first();
                            $Loker->StokKeluar = $Loker->StokKeluar+$_SESSION['keluar'][$i][7];
                            $Loker->StokAkhir = $Loker->StokMasuk+$Loker->StokLoker-$Loker->StokKeluar;
                            $Loker->save();
                            if ($Loker->StokAkhir <= 5) {                                
                                Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message) {
                                    $message->to('burgerkillselalu@gmail.com', 'Restok') -> subject('Penting');
                                    $message->from('burgerkillselalu@gmail.com', 'Bitfumes');
                                });
                            }
                        } else if ($_SESSION['keluar'][$i][5]=="Tools") {
                            $Tools = Tools::where('NamaTools',$_SESSION['keluar'][$i][6])->first();
                            $Tools->StokKeluar = $Tools->StokKeluar+$_SESSION['keluar'][$i][7];
                            $Tools->StokAkhir = $Tools->StokMasuk+$Tools->StokTools-$Tools->StokKeluar;
                            $Tools->save();
                            if ($Tools->StokAkhir <= 5) {                                
                                Mail::send(['text'=>'mail'],['name', 'Sarthak'], function($message) {
                                    $message->to('burgerkillselalu@gmail.com', 'Restok') -> subject('Penting');
                                    $message->from('burgerkillselalu@gmail.com', 'Bitfumes');
                                });
                            }
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
