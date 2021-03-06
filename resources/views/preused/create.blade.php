<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
              <div class="row"> <!-- Form tambah -->
                {!! Form::open(['url' => 'databarang/preused','files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('KodePreused') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('KodePreused', 'Kode Preused', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('KodePreused',null,['class'=>'form-control','placeholder'=>'Kode Preused', 'required']) !!}
                        {!! $errors->first('KodePreused', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaPreused') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('NamaPreused', 'Nama Preused', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('NamaPreused',null,['class'=>'form-control','placeholder'=>'Nama Preused', 'required']) !!}
                        {!! $errors->first('NamaPreused', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('JenisKar') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('JenisKar', 'Jenis Karyawan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select required name="JenisKar" id="JenisKar" class="form-control">
                            <option value="">Pilih Jenis Karyawan</option>
                            <option value="OJT" >OJT</option>
                            <option value="Subcon">Subcon</option>
                            <option value="Employee">Employee</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Status') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Status', 'Status', ['class' => 'control-label','rows'=>3 ]) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select required name="Status" id="Status" class="form-control">
                            <option value="">Pilih Status Karyawan</option>
                            <option value="Staff" >Staff</option>
                            <option value="NonStaff">Non - Staff</option>
                            <option value="null"> </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Ukuran') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Ukuran', 'Ukuran Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select required name="Ukuran" id="Ukuran" class="form-control">
                            <option value="">Pilih Ukuran Seragam</option>
                            <option value="S">S</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Keterangan', 'Keterangan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control','rows'=>3, 'placeholder'=>'Keterangan', 'required']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('HrgPreused') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('HrgPreused', 'Harga Preused', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('HrgPreused',null,['id'=>'HrgPreused','class'=>'form-control','rows'=>5, 'placeholder'=>'Harga Preused', 'required']) !!}
                        {!! $errors->first('HrgPreused', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        <script>
                          $("#HrgPreused").maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
                          $( "#HrgPreused" ).focus();
                        </script>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('StokPreused') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('StokPreused', 'Stok Preused', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('StokPreused',null,['class'=>'form-control','rows'=>5, 'placeholder'=>'Stok Seragam', 'required']) !!}
                        {!! $errors->first('StokPreused', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Picture') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Picture', 'Picture', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::file('Picture', ['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('Picture', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        <small>Jenis File : PNG, JPG,   </small>
                      </div>
                    </div>
                    <small style= "color : red;">* : Required/Harus Diisi.</small>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    {!! Form::close() !!}
                </div> <!-- Batas Form -->
            </div> <!-- /.modal-body -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
