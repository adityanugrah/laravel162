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
<?php
    session_start();
?>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
     {!! Form::open(['url' => '/transaksi/transaksikeluar']) !!}
        <div class="row">
            <input type="hidden" name="aksi" value="0"/>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeKeluar') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeKeluar', 'Kode Keluar') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('KodeKeluar',null,['class'=>'form-control', 'placeholder'=>'Kode Keluar', 'readonly','required']) !!}
                    {!! $errors->first('KodeKeluar', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Pinjam') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Pinjam', 'Tanggal Pinjam') !!}
                    <span style="color: red">*</span>
                    {!! Form::date('Tgl_Pinjam',null,['class'=>'form-control', 'placeholder'=>'Tanggal Pinjam', 'required']) !!}
                    {!! $errors->first('Tgl_Pinjam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Kembali') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Kembali', 'Tanggal Kembali') !!}
                    <span style="color: red">*</span>
                    {!! Form::date('Tgl_Kembali',null,['class'=>'form-control', 'placeholder'=>'Tanggal Kembali', 'required']) !!}
                    {!! $errors->first('Tgl_Kembali', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaKaryawan') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaKaryawan', 'Nama Karyawan') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('NamaKaryawan',null,['class'=>'form-control', 'placeholder'=>'Nama Karyawan ', 'required']) !!}
                    {!! $errors->first('NamaKaryawan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group {{ $errors->has('JenisBrg') ? 'has-error has-feedback' : '' }}">
                    <label class="control-label" for="date_modified">Jenis Barang</label>
                    <span style="color: red">*</span>
                    <select required name="JenisBrg" id="JenisBrg" onChange="getJenisK(this.id)" class="form-control">
                        <option value="">Pilih Jenis Barang</option>
                        <option value="Seragam" >Seragam Baru</option>
                        <option value="Preused">Pre-Used</option>
                        <option value="Loker">Loker</option>
                        <option value="Tools">Tools</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaBrg') ? 'has-error has-feedback' : '' }}" id="temp">
                <label class="control-label" for="status">Nama Barang</label>
                <span style="color: red">*</span>
                <select required="true" name="NamaBrg" id="NamaBrg" class="form-control" required="true">
                    <option value="">Pilih Nama Barang</option>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('JumlahBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('JumlahBrg', 'Jumlah Barang') !!}
                    <span style="color: red">*</span>
                    {!! Form::number('JumlahBrg',null,['class'=>'form-control', 'placeholder'=>'Jumlah Barang', 'required']) !!}
                    {!! $errors->first('JumlahBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
        </div>
        <small style= "color : red;">* : Required/Harus Diisi.</small>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah Barang</button>
        </div>
        {!! Form::close() !!}
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                <?php $grand_total=0;$no=1?>
                @if(isset($_SESSION['ada']))
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Nama Karyawan</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                       
                            @for ($i=0;$i<=$_SESSION['ada'];$i++)
                            <tr class="gradeA">
                                <td>{{ $no++ }}</td>
                                <td><?php echo $_SESSION['keluar'][$i][1]; ?></td>
                                <td><?php echo $_SESSION['keluar'][$i][2]; ?></td>
                                <td><?php echo $_SESSION['keluar'][$i][3]; ?></td>
                                <td><?php echo $_SESSION['keluar'][$i][5]; ?></td>
                                <td><?php echo $_SESSION['keluar'][$i][6]; ?></td>
                                <td class="center">
                                   {!! Form::open(['url' => '/transaksi/transaksikeluar']) !!}
                                        <input type="hidden" name="aksi" value="3"/>
                                        <input type="hidden" name="idelete" value="{{$i}}"/>
                                        <button type="submit" class="btn btn-danger fa fa-trash delete-confirm hapus">
                                        </button>
                                    {!! Form::close() !!}                                 
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    {!! Form::open(['url' => '/transaksi/transaksikeluar']) !!}
                        <input type="hidden" name="aksi" value="1"/>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    {!! Form::close() !!}
                    {!! Form::open(['url' => '/transaksi/transaksikeluar']) !!}
                        <input type="hidden" name="aksi" value="2"/>
                        <button type="submit" class="btn btn-primary">Bersihkan</button>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div> 
<!-- batas -->
</div>

<script src="{{url('js/jquery-2.1.1.js')}}"></script>

<script>
    $(document).ready(function(){
        $.get("/transaksi/getKodeKeluar",function(data){
            document.getElementById("KodeKeluar").value = data;
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
    function getJenisK(s1) {
        var s1 = document.getElementById (s1);
        $("#temp").load("/transaksi/namabarang/"+s1.value);
    }
</script>
@endsection
