@extends('welcome')
@section('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Seragam</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/databarang/seragam">Seragam</a>
            </li>
            <li class="active">
                <strong>Detail Seragam</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Picture Seragam : {{ $seragam->KodeSeragam }}</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="/img/seragam/{{$seragam->Picture}}" style="width:345px; height:380px">
                    </div>     
                </div>
            </div>
        </div>
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
                                                <td><h4>Kode Seragam</h4></td>
                                                <td>&emsp;</td>
                                                <td><h4>:</h4></td>
                                                <td>&nbsp;</td>
                                                <td><h4>{{ $seragam->KodeSeragam }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Nama Seragam</h4></td>
                                                <td> </td>
                                                <td><h4>:</h4></td>
                                                <td> </td>
                                                <td><h4>{{ $seragam->NamaSeragam }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Jenis Karyawan</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->JenisKar }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Status</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->Status }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Ukuran</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->Ukuran }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Keterangan</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->Keterangan }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Harga Seragam</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4> Rp.{{ number_format($seragam->HrgSeragam) }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Stok</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->StokAkhir }} Unit</h4></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <?php $i = 1; ?>
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button>
                                    @include('seragam.edit')
                                    <form method="POST" action="/databarang/seragam/{{ $seragam->KodeSeragam }}" style="display: inline;">
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