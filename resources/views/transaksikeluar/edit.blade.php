
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
                      {!! Form::label('KodeSeragam', 'Kode Seragam :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::text('KodeSeragam',null,['class'=>'form-control', 'readonly']) !!}
                        {!! $errors->first('KodeSeragam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaSeragam') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('NamaSeragam', 'Nama Seragam :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-7">
                        <div class="input-group">
                        {!! Form::text('NamaSeragam',null,['class'=>'form-control']) !!}
                        {!! $errors->first('NamaSeragam', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Keterangan', 'Keterangan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Picture') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Picture', 'Picture :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::file('Picture',null,['class'=>'form-control']) !!}
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
