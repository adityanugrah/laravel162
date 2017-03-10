<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
                <div class="row"> <!-- Form tambah -->
        
                <form class="form-horizontal" method="POST" action="/seragam" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('kodeseragam') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('kodeseragam', 'Kode Seragam :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::text('kodeseragam',null,['class'=>'form-control']) !!}
                        {!! $errors->first('kodeseragam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('namaseragam') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('namaseragam', 'Nama Seragam :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::text('namaseragam',null,['class'=>'form-control']) !!}
                        {!! $errors->first('namaseragam', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('keterangan') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('keterangan', 'Keterangan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::text('keterangan',null,['class'=>'form-control']) !!}
                        {!! $errors->first('keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('picture') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('picture', 'Picture :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        <div class="input-group">
                        {!! Form::file('picture',null,['class'=>'form-control']) !!}
                        {!! $errors->first('picture', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>

                </div> <!-- Batas Form -->
            </div> <!-- /.modal-body -->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
