<label class="control-label" for="status">Kode Barang</label>
<select name="KodeBrg" id="KodeBrg" class="form-control" required="true">
@foreach ($data as $dat)
	<option>{{ $dat }}</option>
@endforeach
</select>