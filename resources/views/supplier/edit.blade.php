<div class="modal fade" tabindex="-1" id="myModals<?php echo $i ?>" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
              <div class="row"> <!-- Form tambah -->
                {!! Form::model($supplier,['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal','route'=>['supplier.update',$supplier->KodeSupplier]]) !!}
                {{ method_field('PATCH') }}{{csrf_field()}}
                    <div class="form-group {{ $errors->has('KodeSupplier') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('KodeSupplier', 'Kode Supplier :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('KodeSupplier',null,['class'=>'form-control', 'readonly']) !!}
                        {!! $errors->first('KodeSupplier', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaSupplier') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('NamaSupplier', 'Nama Supplier :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('NamaSupplier',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('NamaSupplier', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Keterangan') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Keterangan', 'Keterangan :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::textarea('Keterangan',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('Keterangan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Alamat') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('Alamat', 'Alamat :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('Alamat',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('Alamat', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('KotaSupplier') ? 'has-error has-feedback' : '' }}">
                      {!! Form::label('KotaSupplier', 'Kota Supplier :', ['class' => 'col-md-3 control-label']) !!}
                      <div class="col-md-6">
                        {!! Form::text('KotaSupplier',null,['class'=>'form-control', 'required']) !!}
                        {!! $errors->first('KotaSupplier', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
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