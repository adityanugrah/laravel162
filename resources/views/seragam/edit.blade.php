<div class="modal fade" tabindex="-1" id="myModals<?php echo $i ?>" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
                <div class="row"> <!-- Form tambah -->
                {!! Form::model($seragam,['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal','route'=>['seragam.update',$seragam->KodeSeragam]]) !!}
                {{ method_field('PATCH') }}{{csrf_field()}}
                    <div class="form-group {{ $errors->has('KodeSeragam') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('KodeSeragam','Kode Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('KodeSeragam',null,['class'=>'form-control', 'readonly']) !!}
                        {!! $errors->first('KodeSeragam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaSeragam') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('NamaSeragam', 'Nama Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('NamaSeragam',null,['class'=>'form-control', 'placeholder'=>'Nama Seragam', 'required']) !!}
                        {!! $errors->first('NamaSeragam', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('JenisKar') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('JenisKar', 'Jenis Karyawan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select name="JenisKar" id="JenisKar" class="form-control">
                            <option value="">Pilih Jenis Karyawan</option>
                            <option value="OJT" @if($seragam->JenisKar=="OJT") selected @endif>OJT</option>
                            <option value="Subcon"  @if($seragam->JenisKar=="Subcon") selected @endif>Subcon</option>
                            <option value="Employee" @if($seragam->JenisKar=="Employee") selected @endif>Employee</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Status') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Status','Status', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select name="Status" id="Status" class="form-control">
                            <option value="">Pilih Status Karyawan</option>
                            <option value="Staff" @if($seragam->Status=="Staff") selected @endif>Staff</option>
                            <option value="NonStaff" @if($seragam->Status=="NonStaff") selected @endif>NonStaff</option>
                            <option value=""@if($seragam->Status=="") selected @endif></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Ukuran') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Ukuran', 'Ukuran Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select name="Ukuran" id="Ukuran" class="form-control">
                            <option>Pilih Ukuran Seragam</option>
                            <option value="S"@if($seragam->Ukuran=="S") selected @endif>S</option>
                            <option value="S"@if($seragam->Ukuran=="M") selected @endif>M</option>
                            <option value="L"@if($seragam->Ukuran=="L") selected @endif>L</option>
                            <option value="XL"@if($seragam->Ukuran=="XL") selected @endif>XL</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Keterangan', 'Keterangan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control' ,'rows'=>5]) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('HrgSeragam') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('HrgSeragam', 'Harga Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('HrgSeragam',null,['id'=>'HrgSeragam1',
                        'class'=>'form-control','rows'=>5, 'placeholder'=>'Harga Seragam', 'required']) !!}
                        {!! $errors->first('HrgSeragam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        <script>
                          $("#HrgSeragam1").maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
                          $( "#HrgSeragam1" ).focus();
                        </script>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('StokAkhir') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('StokAkhir', 'Stok Seragam', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('StokAkhir',null,['class'=>'form-control','rows'=>5, 'placeholder'=>'Stok Seragam', 'required']) !!}
                        {!! $errors->first('StokAkhir', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class = "col-md-3">
                      {!! Form::label('Picture', 'Picture', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class = "col-md-7">
                        <img src="../../img/seragam/{{ $seragam->Picture }}" width="150px">
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Picture') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                        
                      </div>
                      <div class="col-md-6">
                        {!! Form::file('Picture',null,['class'=>'form-control']) !!}
                        {!! $errors->first('Picture', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
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
