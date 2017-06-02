@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Seragam</h2>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Tambah Barang
		</button>
		@include('seragam.create')
		<a href="/download/Template Seragam.ods" class="btn btn-primary">Download Template </a>
		<table>
			<tr>				
				<form style="border: solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importSeragam') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
					<button class="btn btn-primary">Import File</button>
					<br><br>
					<input type="file" name="import_file" />
					{{ csrf_field() }}
				</form>
			</tr>
		</table>
    </div>
    <div class="col-lg-2">
    	
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                     	<thead>
		                    <tr>
		                    	<th>No.</th>
		                        <th>Kode Seragam</th>
		                        <th>Nama Seragam</th>
		                        <th>Stok Seragam</th>
		                        <th>Keterangan</th>
		                        <th>Action</th>
		                    </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $i = 1; ?>
            				@foreach($seragams as $seragam)
	                    	<tr class="gradeA">
	                    		<td>
	                    		{{ $i++ }}
	                    		</td>
		                        <td>
		                        	<a href="/databarang/seragam/{{ $seragam->KodeSeragam }}">{{ $seragam->KodeSeragam }}</a>
		                        </td>
		                        <td>{{ $seragam->NamaSeragam }}</td>
		                        <td>{{ $seragam->StokAkhir }}</td>
		                        <td>{{ $seragam->Keterangan }}</td>
		                        <td class="center">
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button> 
                                    @include('seragam.edit')
			                      	<form method="POST" action="/databarang/seragam/{{ $seragam->KodeSeragam }}" style="display: inline;">
			                          {{ method_field('DELETE') }}{{csrf_field()}}
			                          <button type="submit" class="btn btn-danger fa fa-trash delete-confirm demo4" title="Hapus Data">
			                          	<span class="lnr lnr-trash"></span>
			                          </button>
			                      	</form>
		                        </td>
		                    </tr>
		                    @endforeach
	                    </tbody>
                    </table>
                    <a href="{{ url('downloadSeragam/xlsx') }}" class="btn btn-primary">Download Laporan </a>
                </div>
	        </div>
        </div>
    </div>
</div>
@endsection