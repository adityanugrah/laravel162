<label class="control-label" for="status">Nama Barang</label>
<span style="color: red">*</span>
<select name="NamaBrg" id="NamaBrg" onChange="getSize()"  class="form-control" required="true">
	<option >Pilih Nama Barang</option>
	@foreach ($data as $dat)
		@if($id=="Seragam")
		<option value="{{$dat->NamaSeragam}}">{{ $dat->NamaSeragam }} ({{ $dat->Ukuran }})</option>
		@elseif ($id=="Preused")
		<option value="{{$dat->NamaPreused}}">{{ $dat->NamaPreused }} ({{ $dat->Ukuran }})</option>
		@elseif ($id=="Loker")
		<option value="{{$dat->NamaLoker}}">{{ $dat->NamaLoker }}</option>
		@elseif ($id=="Tools")
		<option value="{{$dat->NamaTools}}">{{ $dat->NamaTools }}</option>
		@endif
	@endforeach
</select>

<script type="text/javascript">
    function getBarang(a) {
        var x = document.getElementById ("KodeBrg").value;
        $.get("/transaksi/getBarang/"+x+"/"+a,function(data){
            document.getElementById("NamaBrg").value = data;
        });
    }
    
</script>