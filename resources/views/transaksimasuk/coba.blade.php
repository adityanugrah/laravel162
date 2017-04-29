<label class="control-label" for="status">Nama Barang</label>
<select name="NamaBrg" id="NamaBrg" onChange="getHarga('{{$id}}')" class="form-control" required="true">
	<option value="">Pilih Nama Barang</option>
	@foreach ($data as $dat)
		@if($id=="Seragam")
		<option value="{{$dat->NamaSeragam}}">{{ $dat->NamaSeragam }} ({{ $dat->Ukuran }})</option>
		@elseif ($id=="Preused")
		<option value="{{$dat->NamaPreused}}">{{ $dat->NamaPreused }}({{ $dat->Ukuran }})</option>
		@elseif ($id=="Loker")
		<option value="{{$dat->NamaLoker}}">{{ $dat->NamaLoker }}({{ $dat->Ukuran }})</option>
		@elseif ($id=="Tools")
		<option value="{{$dat->NamaTools}}">{{ $dat->NamaTools }}({{ $dat->Ukuran }})</option>
		@endif
	@endforeach
</select>

<script src="{{ asset('js/jquery-2.1.1.js') }}" type='text/javascript'></script>
<script type="text/javascript">
    function getHarga(a) {
        var x = document.getElementById ("NamaBrg").value;
        $.get("/transaksi/getBarang/"+x+"/"+a,function(data){
        	//alert(data);
            document.getElementById("HargaBrg").value = data;
        });
    }
</script>