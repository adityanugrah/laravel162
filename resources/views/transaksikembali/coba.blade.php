<label class="control-label" for="status">Nama Barang</label>
<select name="NamaBrg" id="NamaBrg" onChange="getUkuran('{{$kode}}')" class="form-control" required="true">
	<option >Pilih Nama Barang</option>
	@foreach ($data as $dat)
		@if($kode=="Seragam")
			<option value="{{$dat->NamaBrg}}">{{ $dat->NamaBrg }}</option>
		@elseif ($kode=="Preused")
			<option value="{{$dat->NamaBrg}}">{{ $dat->NamaBrg }}</option>
		@elseif ($kode=="Loker")
			<option value="{{$dat->NamaBrg}}">{{ $dat->NamaBrg }}</option>
		@elseif ($kode=="Tools")
			<option value="{{$dat->NamaBrg}}">{{ $dat->NamaBrg }}</option>
		@endif
	@endforeach
</select>

<script src="{{ asset('js/jquery-2.1.1.js') }}" type='text/javascript'></script>
<script type="text/javascript">
    function getUkuran(a) {
        var x = document.getElementById ("NamaBrg").value;
        $.get("/transaksi/getUkuran/"+x+"/"+a,function(data){
            document.getElementById("Size").value = data;
        });
    }
</script>