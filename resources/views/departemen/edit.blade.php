<div class="modal fade" tabindex="-1" id="myModals<?php echo $i ?>" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
                <div class="row"> <!-- Form tambah -->
                {!! Form::model($dep,['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal','route'=>['departemen.update',$dep->KodeDepartemen]]) !!}
                {{ method_field('PATCH') }}{{csrf_field()}}
                    <div class="form-group {{ $errors->has('KodeDepartemen') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-4">
                      {!! Form::label('KodeDepartemen','Kode Departemen', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-6">
                        {!! Form::text('KodeDepartemen',null,['class'=>'form-control', 'placeholder'=>'Kode Departemen','required','readonly']) !!}
                        {!! $errors->first('KodeDepartemen', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaDepartemen') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-4">
                      {!! Form::label('NamaDepartemen', 'Nama Departemen', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-6">
                        {!! Form::text('NamaDepartemen',null,['class'=>'form-control', 'placeholder'=>'Nama Departemen', 'required']) !!}
                        {!! $errors->first('NamaDepartemen', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-4">
                      {!! Form::label('Keterangan', 'Keterangan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-6">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control','rows'=>3, 'placeholder'=>'Keterangan', 'required']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
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
