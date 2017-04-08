@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Transaksi Keluar</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li class="active">
                <strong>Transaksi Keluar</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
     {!! Form::open(['url' => '/transaksi/transaksikeluar']) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeKeluar') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeKeluar', 'Kode Keluar') !!}
                    {!! Form::text('KodeKeluar',null,['class'=>'form-control', 'placeholder'=>'Kode Keluar', 'readonly','required']) !!}
                    {!! $errors->first('KodeKeluar', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Keluar') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Keluar', 'Tanggal Keluar') !!}
                    {!! Form::date('Tgl_Keluar',null,['class'=>'form-control', 'placeholder'=>'Tanggal Keluar', 'required']) !!}
                    {!! $errors->first('Tgl_Keluar', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Kembali') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Kembali', 'Tanggal Kembali') !!}
                    {!! Form::date('Tgl_Kembali',null,['class'=>'form-control', 'placeholder'=>'Tanggal Kembali' ,'required']) !!}
                    {!! $errors->first('Tgl_Kembali', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaKar') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaKar', 'Nama Karyawan') !!}
                    {!! Form::text('NamaKar',null,['class'=>'form-control', 'placeholder'=>'Nama Karyawan','required']) !!}
                    {!! $errors->first('NamaKar', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('JenisBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('JenisBrg', 'Jenis Barang') !!}
                    {!! Form::text('JenisBrg',null,['class'=>'form-control', 'placeholder'=>'Jenis Barang','required']) !!}
                    {!! $errors->first('JenisBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeBrg', 'Kode Barang') !!}
                    {!! Form::text('KodeBrg',null,['class'=>'form-control', 'placeholder'=>'Kode Barang','required']) !!}
                    {!! $errors->first('KodeBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaBrg', 'Nama Barang') !!}
                    {!! Form::text('NamaBrg',null,['class'=>'form-control', 'placeholder'=>'Nama Barang', 'readonly','required']) !!}
                    {!! $errors->first('NamaBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('JumlahBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('JumlahBrg', 'Jumlah Barang') !!}
                    {!! Form::text('JumlahBrg',null,['class'=>'form-control', 'placeholder'=>'Jumlah Barang', 'required']) !!}
                    {!! $errors->first('JumlahBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Kembali</th>
                                <th>Nama karyawan</th>
                                <th>Jumlah Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($keluar as $keluar)
                            <tr class="gradeA">
                                <td>
                                {{ $i++ }}
                                </td>
                                <td>
                                    <a href="/transaksi/transaksikeluar/{{ $keluar->KodeMasuk }}">{{ $keluar->KodeKeluar }}</a>
                                </td>
                                <td>{{ $keluar->Tgl_Keluar }}</td>
                                <td>{{ $keluar->Tgl_kembali }}</td>
                                <td>{{ $keluar->NamaKar }}</td>
                                <td>{{ $keluar->JumlahBrg }}</td>
                                <td class="center">
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button> 

                                    <form method="POST" action="/transaksi/transaksimasuk/{{ $masuk->KodeMasuk }}" style="display: inline;">
                                      {{ method_field('DELETE') }}{{csrf_field()}}
                                      <button type="submit" class="btn btn-danger fa fa-trash delete-confirm" title="Hapus Data">
                                        <span class="lnr lnr-trash"></span>
                                      </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('js/jquery-2.1.1.js')}}"></script>

<script>
    $(document).ready(function(){
        $.get("/transaksi/getKodeMasuk",function(data){
            document.getElementById("KodeMasuk").value = data;
        });
    });
</script>

<script type="text/javascript">
    function getSupplier() {
        var x = document.getElementById ("KodeSupplier").value;
        $.get("/transaksi/getSupplier/"+x,function(data){
            document.getElementById("NamaSupplier").value = data;
        });
    }
</script>

<script type="text/javascript">
    function getJenis(s1) {
        var s1 = document.getElementById (s1);
        $("#temp").load("/transaksi/cobaSeragam/"+s1.value);
    }
</script>
@endsection
