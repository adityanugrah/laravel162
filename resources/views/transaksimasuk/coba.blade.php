<label class="control-label" for="status">Kode Barang</label>
<select name="KodeBrg" id="KodeBrg" onChange="getBarang('{{$id}}')" class="form-control" required="true">
	<option >Pilih Kode Barang</option>
	@foreach ($data as $dat)
		@if($id=="Seragam")
		<option value="{{$dat->KodeSeragam}}">{{ $dat->KodeSeragam }}</option>
		@elseif ($id=="Preused")
		<option value="{{$dat->KodePreused}}">{{ $dat->KodePreused }}</option>
		@elseif ($id=="Loker")
		<option value="{{$dat->KodeLoker}}">{{ $dat->KodeLoker }}</option>
		@elseif ($id=="Tools")
		<option value="{{$dat->KodeTools}}">{{ $dat->KodeTools }}</option>
		@endif
	@endforeach
</select>

<script type="text/javascript">
    function getBarang(a) {
        var x = document.getElementById ("KodeBrg").value;
        $.get("/transaksi/getBarang/"+x+"/"+a,function(data){
        	//alert(data);
            document.getElementById("NamaBrg").value = data;
        });
    }
</script>