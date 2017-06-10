<div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
              <div class="row"> <!-- Form tambah -->
                {!! Form::open(['url' => '/karyawan','files'=>true, 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('KodeKaryawan') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('KodeKaryawan','Kode Karyawan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('KodeKaryawan',null,['class'=>'form-control', 'placeholder'=>'Kode Karyawan','required']) !!}
                        {!! $errors->first('KodeKaryawan', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('NamaKaryawan') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('NamaKaryawan', 'Nama Karyawan', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('NamaKaryawan',null,['class'=>'form-control', 'placeholder'=>'Nama Karyawan', 'required']) !!}
                        {!! $errors->first('NamaKaryawan', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Status') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Status','Status', ['class' => 'control-label']) !!}
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
                    <div class="form-group {{ $errors->has('DepartemenKar') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('DepartemenKar', 'Departemen', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select required name="DepartemenKar" id="DepartemenKar" class="form-control">
                            <option value="">Pilih Nama Departemen</option>
                            @foreach ($deps as $dep)
                              <option value="{{$dep -> NamaDepartemen}}">{{$dep -> NamaDepartemen}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Alamat') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Alamat', 'Alamat', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::text('Alamat',null,['class'=>'form-control', 'placeholder'=>'Alamat Karyawan', 'required']) !!}
                        {!! $errors->first('Alamat', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Telepon') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Telepon', 'Telepon', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::number('Telepon',null,['class'=>'form-control', 'placeholder'=>'Telepon', 'required']) !!}
                        {!! $errors->first('Telepon', '<span class="fa fa-times form-control-feedback"></span><span class="help-block">:message</span>'); !!}
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
                        <small class="help-block">Jenis File : PNG, JPG,   </small>
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Email') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Email','Email', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        {!! Form::email('Email',null,['class'=>'form-control', 'placeholder'=>'Email','required']) !!}
                        {!! $errors->first('Email', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('Password') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Password','Password', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">                        
                        <input type="Password" class="form-control" name="Password" required="true" placeholder="Password">
                        {!! $errors->first('Password', '<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); !!}
                      </div>
                    </div>
                    <div class="form-group {{ $errors->has('HakAkses') ? 'has-error has-feedback' : '' }}">
                      <div class = "col-md-3">
                      {!! Form::label('Hak Akses','HakAkses', ['class' => 'control-label']) !!}
                      <span style="color: red">*</span>
                      </div>
                      <div class="col-md-7">
                        <select required name="HakAkses" id="HakAkses" class="form-control">
                          <option value="">Pilih Hak Akses</option>
                          @foreach ($data as $datas)
                            <option value="{{$datas -> id}}">{{$datas -> name}}</option>
                          @endforeach
                        </select>
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
