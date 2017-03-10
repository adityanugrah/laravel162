<div class="modal fade" tabindex="-1" id="myModals<?php echo $i ?>" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Barang</h4>
          </div>
            <div class="modal-body"> <!-- /.body -->
                <div class="row"> <!-- Form tambah -->

                  <form enctype="multipart/form-data" class="form-horizontal" role="form" method="post" action="/seragam/{{$seragam->kodeseragam}}" >
                     <input type="hidden" name="_method" value="put" />
                    <div class="form-group {{$errors->has('kodeseragam')?'has-error has-feedback' : ''}}">
                        <label class="col-md-3 control-label" for="kodeseragam">Kode Seragam</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="kodeseragam" name="kodeseragam" value="{{ old('kodeseragam') ? old('kodeseragam'):(isset($seragam->kodeseragam) ? $seragam->kodeseragam : '') }}" readonly>
                        <?php echo $errors->first('kodeseragam','<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('namaseragam')?'has-error has-feedback' : ''}}">
                        <label class="col-md-3 control-label" for="namaseragam">Nama Seragam</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="namaseragam" name="namaseragam" value="{{ old('namaseragam') ? old('namaseragam'):(isset($seragam->namaseragam) ? $seragam->namaseragam : '') }}">
                        <?php echo $errors->first('namaseragam','<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('keterangan')?'has-error has-feedback' : ''}}">
                        <label class="col-md-3 control-label" for="keterangan">Keterangan</label>
                        <div class="col-md-6">
                          <textarea class="form-control" id="keterangan" name="keterangan">{{ old('keterangan') ? old('keterangan'):(isset($seragam->keterangan) ? $seragam->keterangan : '') }}</textarea>
                        <?php echo $errors->first('keterangan','<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
                        </div>
                    </div>
                    <div class="form-group {{$errors->has('picture')?'has-error has-feedback' : ''}}">
                        <label class="col-md-3 control-label" for="picture">Picture</label>
                        <div class="col-md-6">
                          <input type="file" class="form-control" id="picture" name="picture" value="{{old('picture') ? old('picture'): (isset($seragam->picture) ? $seragam->picture : '') }}">
                          <?php echo $errors->first('picture','<span class="glyphicon glyphicon-remove form-control-feedback"></span><span class="help-block">:message</span>'); ?>
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
