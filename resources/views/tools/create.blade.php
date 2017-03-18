<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
              <div class="row"> <!-- Form tambah -->
                {!! Form::open(['url' => 'databarang/tools','files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('KodeTools') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('KodeTools', 'Kode Tools :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::text('KodeTools',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('KodeTools', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaTools') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('NamaTools', 'Nama Tools :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-7">
                        <div class="input-group">
                        {!! Form::text('NamaTools',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('NamaTools', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Keterangan', 'Keterangan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Picture') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Picture', 'Picture :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::file('Picture',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('Picture', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
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
