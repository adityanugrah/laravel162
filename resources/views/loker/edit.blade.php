
<div class="modal fade" tabindex="-1" id="myModals<?php echo $i ?>" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
                <div class="row"> <!-- Form tambah -->
                {!! Form::model($loker,['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal','route'=>['loker.update',$loker->KodeLoker]]) !!}
                {{ method_field('PATCH') }}{{csrf_field()}}
                    <div class="form-group {{ $errors->has('KodeLoker') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('KodeLoker', 'Kode Loker', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('KodeLoker',null,['class'=>'form-control', 'readonly']) !!}
                        {!! $errors->first('KodeLoker', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaLoker') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('NamaLoker', 'Nama Loker', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('NamaLoker',null,['class'=>'form-control','placeholder'=>'Nama Loker', 'required']) !!}
                        {!! $errors->first('NamaLoker', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('JenisKar') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('JenisKar', 'Jenis Karyawan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select name="JenisKar" id="JenisKar" class="form-control">
                            <<option value="">Pilih Jenis Karyawan</option>
                            <option value="Subcon"  @if($loker->Jeniskar=="Subcon") selected @endif>Subcon</option>
                            <option value="Employee" @if($loker->Jeniskar=="Employee") selected @endif>Employee</option>
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
                    <div class="form-group {{ $errors->has('HrgLoker') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('HrgLoker', 'Harga Loker', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('HrgLoker',null,['id'=>'HrgLoker1','class'=>'form-control','rows'=>5, 'placeholder'=>'Harga Loker', 'required']) !!}
                        {!! $errors->first('HrgLoker', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                        <script>
                          $("#HrgLoker1").maskMoney({prefix:'', thousands:'.', decimal:',', precision:0});
                          $( "#HrgLoker1" ).focus();
                        </script>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('StokAkhir') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('StokAkhir', 'Stok Loker', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('StokAkhir',null,['class'=>'form-control','rows'=>5, 'placeholder'=>'Stok Loker', 'required']) !!}
                        {!! $errors->first('StokAkhir', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class = "col-md-3">
                      {!! Form::label('Picture', 'Picture', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class = "col-md-7">
                        <img src="../../img/loker/{{ $loker->Picture }}" width="150px">
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
