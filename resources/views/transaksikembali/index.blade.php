@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Transaksi Pengembalian</h2>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<?php
    session_start();
?>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
     {!! Form::open() !!}
        <div class="row">
            <input type="hidden" name="aksi" value="0"/>
            <div class="col-sm-2">
                <div class="form-group {{ $errors->has('KodeTransaksi') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeTransaksi', 'Kode Transaksi') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('KodeTransaksi',null,['id'=>'transaksikembali','class'=>'form-control', 'placeholder'=>'Kode Transaksi','required']) !!}
                    {!! $errors->first('KodeTransaksi', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div> 
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label style="color: white" class="control-label">Jenis Barang</label>
                    <a id="Cari" name="Cari" class="btn btn-primary" onClick="getKembali('transaksikembali')">Cari Barang</a>
                </div> 
            </div>    
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Pinjam') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Pinjam', 'Tanggal Pinjam') !!}
                    <span style="color: red">*</span>
                    {!! Form::date('Tgl_Pinjam',null,['id'=>'tglpinjam','class'=>'form-control', 'placeholder'=>'Tanggal Pinjam', 'required','readonly']) !!}
                    {!! $errors->first('Tgl_Pinjam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Kembali') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Kembali', 'Tanggal Kembali') !!}
                    <span style="color: red">*</span>
                    {!! Form::date('Tgl_Kembali',null,['id'=>'tglkembali','class'=>'form-control', 'placeholder'=>'Tanggal Kembali', 'required','readonly']) !!}
                    {!! $errors->first('Tgl_Kembali', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Kembali') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Kembali', 'Tanggal Pengembalian') !!}
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
                    {!! Form::text('NamaKaryawan',null,['id'=>'NamaKaryawan','class'=>'form-control', 'placeholder'=>'Nama Karyawan ', 'required','readonly']) !!}
                    {!! $errors->first('NamaKaryawan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaDepartemen') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('NamaDepartemen', 'Nama Departemen') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('NamaDepartemen',null,['id'=>'NamaDepartemen','class'=>'form-control', 'placeholder'=>'Nama Departemen ', 'required', 'readonly']) !!}
                    {!! $errors->first('NamaDepartemen', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
               <div class="form-group {{ $errors->has('JenisBrg') ? 'has-error has-feedback' : '' }}">
                    <label class="control-label" for="date_modified">Jenis Barang</label>
                    <span style="color: red">*</span>
                    <select id="JenisBrg" name="JenisBrg" class="form-control" >
                        <option value="">Pilih Jenis Barang</option>
                        <option value="Seragam">Seragam</option>
                        <option value="Preused">Preused</option>
                        <option value="Loker">Loker</option>
                        <option value="Tools">Tools</option>
                    </select>
                </div>
            </div>     
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaBrg') ? 'has-error has-feedback' : '' }}" id="temp">
                <label class="control-label" for="status">Nama Barang</label>
                <span style="color: red">*</span>
                <select class="form-control" id="NamaBarang" name="NamaBarang" onChange="getJml('transaksikembali')" required="true">
                    <option value="">Pilih Nama Barang</option>
                    @if(isset($namaBarang))
                        @foreach ($namaBarang as $dat)
                            <option value="{{$dat->NamaBrg}}">{{ $dat->NamaBrg }}</option>
                        @endforeach                    
                    @endif
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Size') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Size', 'Size') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('Size',null,['id'=>'Size','class'=>'form-control', 'placeholder'=>'Size', 'required']) !!}
                    {!! $errors->first('Size', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('JumlahBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('JumlahBrg', 'Jumlah Barang') !!}
                    <span style="color: red">*</span>
                    {!! Form::number('JumlahBrg',null,['id'=>'JumlahBrg','class'=>'form-control', 'placeholder'=>'Jumlah Barang', 'required']) !!}
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
                    {!! Form::open(['url' => '/transaksi/transaksikembali']) !!}
                        <input type="hidden" name="aksi" value="1"/>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    {!! Form::close() !!}
                    {!! Form::open(['url' => '/transaksi/transaksikembali']) !!}
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

<script type="text/javascript">
    $("#JenisBrg").change(function(){
        $.ajaxSetup({
           headers: {'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')}
        });

        $.ajax({
            url: "{{ url('ajaxNamaBrg') }}",
            type: "POST",
            data: {
                JenisBrg: $("#JenisBrg").val(),
                kodeKeluar: $("#transaksikembali").val()
            },
            success: function(data){
                var toAppend = '';
                var select = '';
                var length = '';
                select = document.getElementById("NamaBarang");
                length = select.options.length;
                    for (i = 0; i < length; i++) {
                      select.options[i] = null;
                    }
                $('#NamaBarang').append('<option>Pilih Nama Barang</option>');
                $.each(data,function(i,o){
                    toAppend += '<option value='+o+'>'+o+'</option>';
                });
                $('#NamaBarang').append(toAppend);
            },  error: function (error) {
                select = document.getElementById("NamaBarang");
                select.options[i] = null;
                $('#Size').val("");
                $('#JumlahBrg').val("");
                alert('Data Tidak Ditemukan');
            }
        });
    });

    //batas
    $(document).ready(function(){
        $.get("/transaksi/getKodeKeluar",function(data){
            document.getElementById("KodeKeluar").value = data;
        });
    });

    function getKembali(a) {
        var select, length='';
        var x = document.getElementById (a);
        $.get("/transaksi/getData1/"+x.value,function(data1){
            document.getElementById("tglpinjam").value = data1;
        });
        $.get("/transaksi/getData2/"+x.value,function(data2){
            document.getElementById("tglkembali").value = data2;
        });
        $.get("/transaksi/getData3/"+x.value,function(data3){
            document.getElementById("NamaKaryawan").value = data3;
        });
        $.get("/transaksi/getData4/"+x.value,function(data4){
            document.getElementById("NamaDepartemen").value = data4;
        });

        $("#NamaBarang").empty();
        $('#NamaBarang').append('<option>Pilih Nama Barang</option>');
        $('#JenisBrg').prop('selectedIndex',0);
        $('#Size').val("");
        $('#JumlahBrg').val("");
    }

    function getJml(a) {
        var x = document.getElementById (a);
        $.get("/transaksi/getData5/"+x.value,function(data5){
            document.getElementById("Size").value = data5;
        });
        $.get("/transaksi/getData6/"+x.value,function(data6){
            document.getElementById("JumlahBrg").value = data6;
        });
    }
    
    function getDep() {
        var x = document.getElementById ("NamaKaryawan").value;
        $.get("/transaksi/getDep/"+x,function(data){
            document.getElementById("NamaDepartemen").value = data;
        });
    }

    function getJenisK(s1) {
        var s1 = document.getElementById (s1);
        $("#temp").load("/transaksi/namabarang/"+s1.value);
    }
</script>
@endsection
