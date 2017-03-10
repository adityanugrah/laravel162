@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Tambah Barang
		</button>
		@include('seragam.create')
		<br/>
		<br>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    	
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
	        <div class="ibox float-e-margins">
	            <div class="ibox-title">
	                <h5>Basic Data Tables example with responsive plugin</h5>
	                <div class="ibox-tools">
	                    <a class="collapse-link">
	                        <i class="fa fa-chevron-up"></i>
	                    </a>
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-wrench"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li><a href="#">Config option 1</a>
	                        </li>
	                        <li><a href="#">Config option 2</a>
	                        </li>
	                    </ul>
	                    <a class="close-link">
	                        <i class="fa fa-times"></i>
	                    </a>
	                </div>
	            </div>
	            <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
	                    <thead>
		                    <tr>
		                    	<th>No.</th>
		                        <th>Kode Seragam</th>
		                        <th>Nama Seragam</th>
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
		                        	<a href="seragam/{{ $seragam->kodeseragam }}">{{ $seragam->kodeseragam }}</a>
		                        </td>
		                        <td>{{ $seragam->namaseragam }}</td>
		                        <td>{{ $seragam->keterangan }}</td>
		                        <td class="center">
		                        	{{ method_field('PATCH') }} {{ csrf_field() }}
		                        	<button class="btn fa fa-pencil" data-toggle="modal" data-target="#myModals<?php echo $i ?>" title="Ubah Data">
			                        	<span class="lnr lnr-pencil"></span>
			                      	</button>
			                      	@include('seragam.edit')
			                      	<form method="POST" action="/seragam/{{ $seragam->kodeseragam }}" style="display: inline;">
			                          {{ method_field('DELETE') }} {{csrf_field()}}
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