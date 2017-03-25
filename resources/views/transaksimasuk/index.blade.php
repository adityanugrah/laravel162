@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Transaksi Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li class="active">
                <strong>Transaksi Masuk</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
     {!! Form::open(['url' => '/transaksi/transaksimasuk']) !!}
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeMasuk') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeMasuk', 'KodeMasuk') !!}
                    {!! Form::text('KodeMasuk',null,['class'=>'form-control', 'placeholder'=>'KodeMasuk', 'required']) !!}
                    {!! $errors->first('KodeMasuk', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="status">Tanggal Transaksi</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeSupplier') ? 'has-error has-feedback' : '' }}">
                <label class="control-label" for="status">Kode Suppleir</label>
                    <select name="KodeSupplier" onChange="getSupplier()" id="KodeSupplier" class="form-control">
                        <option>Pilih Kode Supplier</option>
                        @foreach ($supplierz as $sup)
                        <option value="{{$sup -> NamaSupplier}}">{{$sup -> KodeSupplier}}</option>
                        @endforeach
                    </select>
                </div>               
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaSupplier') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaSupplier', 'Nama Supplier') !!}
                    {!! Form::text('NamaSupplier',null,['class'=>'form-control', 'id'=>'NamaSupplier', 'placeholder'=>'Nama Supplier', 'required']) !!}
                    {!! $errors->first('NamaSupplier', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group {{ $errors->has('JenisBrg') ? 'has-error has-feedback' : '' }}">
                    <label class="control-label" for="date_modified">Jenis Barang</label>
                    <select name="JenisBrg" id="JenisBrg"  onChange="getJenis(this.id)" class="form-control">
                        <option >Pilih Jenis Barang</option>
                        <option value="Seragam" >Seragam Baru</option>
                        <option value="Preused">Pre-Used</option>
                        <option value="Loker">Loker</option>
                        <option value="Tools">Tools</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeBrg') ? 'has-error has-feedback' : '' }}" id="temp">
                <label class="control-label" for="status">Kode Barang</label>
                <select name="KodeBrg" id="KodeBrg" class="form-control" required="true">
                    
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaBrg', 'Nama Barang') !!}
                    {!! Form::text('NamaBrg',null,['class'=>'form-control', 'id'=>'NamaBrg', 'placeholder'=>'Nama Barang', 'required']) !!}
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
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('HargaBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('HargaBrg', 'Harga Barang') !!}
                    {!! Form::text('HargaBrg',null,['class'=>'form-control', 'placeholder'=>'Harga Barang', 'required']) !!}
                    {!! $errors->first('HargaBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
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
            <div class="ibox">
                <div class="ibox-content">

                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Transaksi</th>
                            <th data-hide="phone">Tanggal Transaksi</th>
                            <th data-hide="phone">Nama Barang</th>
                            <th data-hide="phone">Jumlah Barang</th>
                            <th data-hide="phone,tablet" >Harga Barang</th>
                            <th class="center">Action</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($masukz as $masuk)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                    </td>
                                    <td>
                                       <a href="/transaksi/transaksimasuk{{ $masuk->KodeMasuk }}">{{ $masuk->KodeTransaksiM }}</a>
                                    </td>
                                    <td>
                                       {{ $masuk->Tgl_Masuk }}
                                    </td>
                                    <td>
                                        {{ $masuk->KodeSupplier }}
                                    </td>
                                    <td>
                                        {{ $masuk->NamaSupplier }}
                                    </td>
                                    <td>
                                       null
                                    </td>
                                    <td class="center">
                                        <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals" title="Ubah Data">
                                            <span class="lnr lnr-pencil"></span>
                                        </button> 

                                        <form method="POST" action="/" style="display: inline;">
                                          {{ method_field('DELETE') }}{{csrf_field()}}
                                          <button type="submit" class="btn btn-danger fa fa-trash delete-confirm" title="Hapus Data">
                                            <span class="lnr lnr-trash"></span>
                                          </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getSupplier() {
        var x = document.getElementById ("KodeSupplier").value;
        document.getElementById("NamaSupplier").value = x;
    }
</script>

<script type="text/javascript">
    function getSeragam() {
        var x = document.getElementById ("KodeSeragam").value;
        document.getElementById("NamaSeragam").value = x;
    }
</script>

<script type="text/javascript">
    function getJenis(s1) {
        var s1 = document.getElementById (s1);
        //var s2 = document.getElementById (s2);
        //s2.innerHTML="";
        $("#temp").load("/transaksi/cobaSeragam/"+s1.value);
            //alert('asa');
        /*if (s1.value == "Seragam" ) {
            //document.getElementById("KodeBrg").value ="ok";
            
        } else {
            alert('tidak ada');
        }*/
    }
</script>
@endsection
