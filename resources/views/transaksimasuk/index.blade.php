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
<?php
    session_start();
?>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
     {!! Form::open(['url' => '/transaksi/transaksimasuk', 'id'=>'formID']) !!}    
        <div class="row">
            <input type="hidden" name="aksi" value="0"/>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('KodeMasuk') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('KodeMasuk', 'Kode Masuk') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('KodeMasuk',null,['class'=>'form-control', 'placeholder'=>'Kode Masuk', 'readonly','required']) !!}
                    {!! $errors->first('KodeMasuk', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('Tgl_Masuk') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('Tgl_Masuk', 'Tanggal Masuk') !!}
                    <span style="color: red">*</span>
                    {!! Form::date('Tgl_Masuk',null,['class'=>'form-control', 'placeholder'=>'Tgl_Masuk', 'required']) !!}
                    {!! $errors->first('Tgl_Masuk', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('NamaSupplier') ? 'has-error has-feedback' : '' }}">
                <label class="control-label" for="status">Nama Suppleir</label>
                <span style="color: red">*</span>
                    <select required name="NamaSupplier" id="NamaSupplier" class="form-control">
                        <option value="">Pilih Nama Supplier</option>
                        @foreach ($supplierz as $sup)
                            <option value="{{$sup -> NamaSupplier}}">{{$sup -> NamaSupplier}}</option>
                        @endforeach
                    </select>
                </div>               
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
               <div class="form-group {{ $errors->has('JenisBrg') ? 'has-error has-feedback' : '' }}">
                    <label class="control-label" for="date_modified">Jenis Barang</label>
                    <span style="color: red">*</span>
                    <select required name="JenisBrg" id="JenisBrg" onChange="getJenis(this.id)" class="form-control">
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
                <select required name="NamaBrg" id="NamaBrg" class="form-control" required="true">
                    <option value="">Pilih Nama Barang</option>
                </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group {{ $errors->has('HargaBrg') ? 'has-error has-feedback' : '' }}">
                    {!! Form::label('HargaBrg', 'Harga Barang') !!}
                    <span style="color: red">*</span>
                    {!! Form::text('HargaBrg',null,['id'=>'HargaBrg', 'class'=>'form-control', 'placeholder'=>'Harga Barang', 'required']) !!}
                    {!! $errors->first('HargaBrg', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                    <script type="text/javascript">
                        $("#HargaBrg").maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});    
                    </script>                    
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
                @if(isset($_SESSION['isi']))
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Supplier</th>
                                <th>Jenis Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Barang</th>
                                <th>Jumlah Biaya</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>                       
                            @for ($i=0;$i<=$_SESSION['isi'];$i++)
                            <tr class="gradeA">
                                <td>{{ $no++ }}</td>
                                <td><?php echo $_SESSION['data'][$i][1]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][2]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][3]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][4]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][5]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][6]; ?></td>
                                <td><?php echo $_SESSION['data'][$i][5]*$_SESSION['data'][$i][6]; ?></td>
                                <td class="center"> 
                                   {!! Form::open(['url' => '/transaksi/transaksimasuk']) !!}
                                        <input type="hidden" name="aksi" value="3"/>
                                        <input type="hidden" name="idelete" value="{{$i}}"/>
                                        <button type="submit" class="btn btn-danger fa fa-trash delete-confirm hapus">
                                        </button>
                                    {!! Form::close() !!}                                 
                                </td>
                            </tr>
                            @endfor
                            <tr>
                                @for ($i=0;$i<=$_SESSION['isi'];$i++)
                                    <?php 
                                    $grand_total = $grand_total + ($_SESSION['data'][$i][5]*$_SESSION['data'][$i][6]);
                                    $_SESSION['grand_total'] = $grand_total;
                                    ?>
                                @endfor
                                <td colspan="7"> Total Pembayaran </td>
                                <td><?php echo " Rp. $grand_total";?></td>
                            </tr>
                        </tbody>
                    </table>
                    {!! Form::open(['url' => '/transaksi/transaksimasuk']) !!}
                        <input type="hidden" name="aksi" value="1"/>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    {!! Form::close() !!}
                    {!! Form::open(['url' => '/transaksi/transaksimasuk']) !!}
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
@endsection
