@extends('welcome')
@section('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Transaksi Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/transaksi/transaksimasuk">Transaksi</a>
            </li>
            <li class="active">
                <strong>Detail Transaksi</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <div class="feed-activity-list">
                            <div class="feed-element">
                                <div class="media-body ">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td><h4>Kode Transaksi</h4></td>
                                                <td>&emsp;</td>
                                                <td><h4>:</h4></td>
                                                <td>&nbsp;</td>
                                                <td><h4>{{ $masuk->KodeMasuk }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Tanggal Transaksi</h4></td>
                                                <td> </td>
                                                <td><h4>:</h4></td>
                                                <td> </td>
                                                <td><h4>{{ $masuk->Tgl_Masuk }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Kode Supplier</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->KodeSupplier }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Nama Supplier</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->NamaSupplier }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Jenis Barang</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->JenisBrg }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Kode Barang</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->KodeBrg }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Nama Barang</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->NamaBrg }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Jumlah Barang</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->JumlahBrg }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Harga Barang</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $masuk->HargaBrg }}</h4></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <?php $i = 1; ?>
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button>
                                    
                                    <form method="POST" action="/transaksi/transaksimasuk/{{ $masuk->KodeMasuk }}" style="display: inline;">
                                      {{ method_field('DELETE') }} {{csrf_field()}}
                                      <button type="submit" class="btn btn-danger fa fa-trash delete-confirm" title="Hapus Data">
                                        <span class="lnr lnr-trash"></span>
                                      </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection