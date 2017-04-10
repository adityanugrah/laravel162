<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiMasuk;
use App\DetailMasuk;
use App\Supplier;
use App\Seragam;
use App\Preused;
use App\Loker;
use App\Tools;
use Validator;

class TransaksiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supplierz = Supplier::orderBy('KodeSupplier')->get(); 

        $seragamz = Seragam::orderBy('KodeSeragam')->get(); 

        $masukz = TransaksiMasuk::orderBy('KodeMasuk')->get(); 

        return view('transaksimasuk.index', compact('masukz','supplierz','seragamz'));
    }

    public function cobaSeragam($id){

        if($id=="Seragam") {
            $data=Seragam::orderBy('KodeSeragam')->get();
        } else if ($id=="Preused") {
            $data=Preused::orderBy('KodePreused')->get(); 
        } else if ($id=="Loker") {
            $data=Loker::orderBy('KodeLoker')->get(); 
        } else if ($id=="Tools") {
            $data=Tools::orderBy('KodeTools')->get(); 
        } else {
            $data = "Tidak Ada Data";
        }

        return view('transaksimasuk.coba',compact('data','id'));
    }
    /**qexd
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


            $ada=false;

              if (isset($_SESSION["isi"])  ) {
                
            
                for ($i=0;$i<=$_SESSION['isi'];$i++) {
                    if( ($_SESSION['data'][$i][1] == $request->Tgl_Masuk) &&
                        ($_SESSION['data'][$i][2] == $request->NamaSupplier) &&
                        ($_SESSION['data'][$i][3] == $request->JenisBrg) &&
                        ($_SESSION['data'][$i][4] == $request->NamaBrg) 
                         ){
                        // echo $_SESSION['data'][$i][1] ."  ---   ".$request->Tgl_Masuk." ------ $i  <br>" ;
                        // echo $_SESSION['data'][$i][2] ."  ---   ".$request->NamaSupplier." ------  <br>" ;
                        // echo $_SESSION['data'][$i][3] ."  ---   ".$request->JenisBrg." ------  <br>" ;
                        // echo $_SESSION['data'][$i][4] ."  ---   ".$request->NamaBrg." ------  <br>" ;
                         $_SESSION['data'][$i][5]= $_SESSION['data'][$i][5]+$request->JumlahBrg;
                            $ada=true;
                    }

                }
            }
            
          
            if($ada==false){

            if (!isset($_SESSION["isi"])){
                        $_SESSION["isi"]=0;
                    }else{
                        $_SESSION["isi"]++;
                    }
            $_SESSION['data'][$_SESSION["isi"]] = array(
                $request->KodeMasuk,
                $request->Tgl_Masuk,
                $request->NamaSupplier,
                $request->JenisBrg,
                $request->NamaBrg,
                $request->JumlahBrg,
                $request->HargaBrg);
        }
            return redirect('transaksi/transaksimasuk');
        } else 
        if($request->aksi==2)
        {
            session_start();
            session_destroy();
            
            return redirect('transaksi/transaksimasuk');
        } else  if($request->aksi==3)
        {
            session_start();
            unset($_SESSION['data'][$_SESSION['id_hapus']]);
            $_SESSION['isi']=$_SESSION['isi']-1;
            $_SESSION['data']=array_values($_SESSION['data']);    
            // print_r(array_values($_SESSION['data']));    
            return redirect('transaksi/transaksimasuk');
        } else {
            try {

                session_start();
                $grand_total=0;
                // $StokSeragam;

                for ($i=0;$i<=$_SESSION['isi'];$i++) {
                    //jumlah*harga
                    $grand_total = $grand_total + ($_SESSION['data'][$i][5]*$_SESSION['data'][$i][6]);

                    $masuk = new TransaksiMasuk;
                    $masuk->KodeMasuk       = $_SESSION['data'][$i][0];
                    $masuk->Tgl_Masuk       = $_SESSION['data'][$i][1];  //
                    $masuk->NamaSupplier    = $_SESSION['data'][$i][2];   //
                    $masuk->GrandTotal      = $grand_total;

                    $detail = new DetailMasuk;  
                    $detail->KodeMasuk       = $_SESSION['data'][$i][0];
                    $detail->JenisBrg        = $_SESSION['data'][$i][3];   //  
                    $detail->NamaBrg         = $_SESSION['data'][$i][4];   //
                    $detail->JumlahBrg       = $_SESSION['data'][$i][5];   
                    $detail->HargaBrg        = $_SESSION['data'][$i][6];
                    $detail->save();

                    if($_SESSION['data'][$i][3]=="Seragam") {
                        $seragam = Seragam::where('NamaSeragam',$_SESSION['data'][$i][4])->first(); //kodebarang
                        $seragam->StokMasuk = $seragam->StokMasuk+$_SESSION['data'][$i][5]; //jumlabarang
                        $seragam->StokAkhir = $seragam->StokMasuk+$seragam->StokSeragam;
                        $seragam->save();
                    } else if ($_SESSION['data'][$i][3]=="Preused") {
                        $Preused = Preused::where('NamaPreused',$_SESSION['data'][$i][4])->first(); //kodebarang
                        $Preused->StokMasuk = $Preused->StokMasuk+$_SESSION['data'][$i][5]; //jumlabarang
                        $Preused->StokAkhir = $Preused->StokMasuk+$Preused->StokPreused;
                        $Preused->save();
                    } else if ($_SESSION['data'][$i][3]=="Loker") {
                        $Loker = Loker::where('NamaLoker',$_SESSION['data'][$i][4])->first(); //kodebarang
                        $Loker->StokMasuk = $Loker->StokMasuk+$_SESSION['data'][$i][5]; //jumlabarang
                        $Loker->StokAkhir = $Loker->StokMasuk+$Preused->StokLoker;
                        $Loker->save();
                    } else if ($_SESSION['data'][$i][3]=="Tools") {
                        $Tools = Tools::where('NamaTools',$_SESSION['data'][$i][4])->first(); //kodebarang
                        $Tools->StokMasuk = $Tools->StokMasuk+$_SESSION['data'][$i][5]; //jumlabarang
                        $Tools->StokAkhir = $Tools->StokMasuk+$Tools->StokTools;
                        $Tools->save();
                    } else {
                        $data = "Tidak Ada Data";   
                    }

                }

                $masuk->save(); 

                session_destroy();
                return redirect('transaksi/transaksimasuk')->with('pesan_sukses', 'Transaksi Masuk has been saved.');
            
                if ($validator -> fails()) {
                        return redirect('transaksi/transaksimasuk')->withErrors($validator)->withInput();
                }

            } 
            catch (Exception $e) {
                return redirect('transaksi/transaksimasuk')->with('pesan_gagal', $e->getMessage());
            }
//             session_start();

// print_r($_SESSION['data']);
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
        $masuk = TransaksiMasuk::where('KodeMasuk', $id)->first();
        return view('transaksimasuk.show', compact('masuk'));
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
        try {
            
            $photo=TransaksiMasuk::find($id);
            
            TransaksiMasuk::find($id)->delete();          
            return redirect('transaksi/transaksimasuk')->with('pesan_sukses', 'Data successfully removed .');
        }
        catch(Exception $e) {
            return redirect('transaksi/transaksimasuk')->with('pesan_gagal', $e->getMessage());
        }
    }
}
