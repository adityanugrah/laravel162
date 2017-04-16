@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Laporan Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/laporan">Laporan</a>
            </li>
            <li class="active">
                <strong>Laporan Masuk</strong>
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
                    <h5>Laporan Transaksi Masuk</h5>
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
			                        <th>Kode Masuk</th>
			                        <th>Tanggal Transaksi</th>
			                        <th>Nama Supplier(s)</th>
			                        <th>Grand Total</th>
			                        <th>Action</th>
			                    </tr>
		                    </thead>
		                    <tbody>
		                    	<?php $i = 1; ?>
	            				@foreach($masuk as $masuk)
		                    	<tr class="gradeA">
		                    		<td>
		                    		{{ $i++ }}
		                    		</td>
			                        <td>
			                        	<a href="/laporan/laporanmasuk/{{ $masuk->KodeMasuk }}">{{ $masuk->KodeMasuk }}</a>
			                        </td>
			                        <td>{{ $masuk->Tgl_Masuk }}</td>
			                        <td>{{ $masuk->NamaSupplier }}</td>
			                        <td>{{ $masuk->GrandTotal }}</td>
			                        <td class="center">
				                        <form action="/laporan/laporanmasuk/{{ $masuk->KodeMasuk }}" {{ $masuk->KodeMasuk }} ?>
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