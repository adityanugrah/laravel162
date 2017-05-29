@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Laporan Pengembalian</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/laporan">Laporan</a>
            </li>
            <li class="active">
                <strong>Laporan Pengembalian</strong>
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
                    <h5>Laporan Transaksi Pengembalian</h5>
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
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example">
							<thead>
			                    <tr>
			                        <th>No</th>
			                        <th>Kode Kembali</th>
			                        <th>Tanggal Transaksi</th>
			                        <th>Nama Supplier(s)</th>
			                        <th>Grand Total</th>
			                        <th>Action</th>
			                    </tr>
		                    </thead>
		                    <tbody>
		                    	<?php $i = 1; ?>
	            				@foreach($kembali as $kembali)
		                    	<tr class="gradeA">
		                    		<td>
		                    		{{ $i++ }}
		                    		</td>
			                        <td>
			                        	<a href="/laporan/laporankembali/{{ $kembali->KodeKembali }}">{{ $kembali->KodeKembali }}</a>
			                        </td>
			                        <td>{{ $kembali->Tgl_Pengembalian }}</td>
			                        <td>{{ $kembali->NamaKaryawan }}</td>
			                        <td>{{ $kembali->NamaDepartemen }}</td>
			                        <td class="center">
				                        <form action="/laporan/laporankembali/{{ $kembali->KodeKembali }}" {{ $kembali->KodeKembali }} ?>
		                                    <button type="submit" title="Ubah Data">
		                                        Detail
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
</div>
@endsection