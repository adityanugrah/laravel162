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
                      {!! Form::label('KodePreused', 'Kode Preused :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('KodePreused',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('KodePreused', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaPreused') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('NamaPreused', 'Nama Preused :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('NamaPreused',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('NamaPreused', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('JenisKar') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('JenisKar', 'Jenis Karyawan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <select name="JenisKar" id="JenisKar" class="form-control">
                            <option >Pilih Jenis Karyawan</option>
                            <option value="OJT" >OJT</option>
                            <option value="Subcon">Subcon</option>
                            <option value="Employee">Employee</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Status') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Status', 'Status Karyawan :', ['class' => 'col-md-3 control-label','rows'=>3 ]) !!}
                      <div class="col-md-6">
                        <select name="Status" id="Status" class="form-control">
                            <option >Pilih Status Karyawan</option>
                            <option value="Staff" >Staff</option>
                            <option value="NonStaff">Non - Staff</option>
                            <option value="">Null</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Ukuran') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Ukuran', 'Ukuran Seragam :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <select name="Ukuran" id="Ukuran" class="form-control">
                            <option >Pilih Ukuran Seragam</option>
                            <option value="S" >S</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Keterangan', 'Keterangan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control','rows'=>5 , 'required']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Picture') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Picture', 'Picture :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::file('Picture',null,['class'=>'form-control', 'required']) !!}
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
