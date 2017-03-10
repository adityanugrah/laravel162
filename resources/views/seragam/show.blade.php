@extends('welcome')
@section('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Judul</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Extra Pages</a>
            </li>
            <li class="active">
                <strong>Profile</strong>
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
                    <h5>Kode Seragam : {{ $seragam->kodeseragam }}</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-responsive" src="/img/seragam/{{$seragam->picture}}"" style="width:345px; height:230px">
                    </div>     
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Activites</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
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
                                                <td><h4>{{ $seragam->kodeseragam }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Nama Seragam</h4></td>
                                                <td> </td>
                                                <td><h4>:</h4></td>
                                                <td> </td>
                                                <td><h4>{{ $seragam->namaseragam }}</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Keteragan</h4></td>
                                                <td></td>
                                                <td><h4>:</h4></td>
                                                <td></td>
                                                <td><h4>{{ $seragam->keterangan }}</h4></td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <?php $i = 1; ?>
                                    {{ method_field('PATCH') }} {{ csrf_field() }}
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button>
                                    @include('seragam.edit')
                                    <form method="POST" action="/seragam/{{ $seragam->kodeseragam }}" style="display: inline;">
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