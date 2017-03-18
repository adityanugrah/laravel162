@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Loker</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Tambah Barang
		</button>
		@include('loker.create')
		<br/><br/>
		<table>
			<tr>				
				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importLoker') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

					<input type="file" name="import_file" />
					{{ csrf_field() }}
					<br/>

					<button class="btn btn-primary">Import CSV/Excel File</button>

				</form>
				<br/>
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
		                        <th>Kode Loker</th>
		                        <th>Nama Loker</th>
		                        <th>Keterangan</th>
		                        <th>Action</th>
		                    </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $i = 1; ?>
            				@foreach($lokers as $loker)
	                    	<tr class="gradeA">
	                    		<td>
	                    		{{ $i++ }}
	                    		</td>
		                        <td>
		                        	<a href="loker/{{ $loker->KodeLoker }}">{{ $loker->KodeLoker }}</a>
		                        </td>
		                        <td>{{ $loker->NamaLoker }}</td>
		                        <td>{{ $loker->Keterangan }}</td>
		                        <td class="center">
                                    <button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
                                        <span class="lnr lnr-pencil"></span>
                                    </button> 
                                    @include('loker.edit')
			                      	<form method="POST" action="/databarang/loker/{{ $loker->KodeLoker }}" style="display: inline;">
			                          {{ method_field('DELETE') }}{{csrf_field()}}
			                          <button type="submit" class="btn btn-danger fa fa-trash delete-confirm" title="Hapus Data">
			                          	<span class="lnr lnr-trash"></span>
			                          </button>
			                      	</form>
		                        </td>
		                    </tr>
		                    @endforeach
	                    </tbody>
                    </table>
                </div>
	        </div>
        </div>
    </div>
</div>
@endsection