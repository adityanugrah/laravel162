@extends ('welcome')
@section ('konten')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Laporan Detail Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/laporan">Laporan</a>
            </li>
            <li>
                <a href="/laporan/laporankeluar">Laporan Keluar</a>
            </li>
            <li class="active">
                <strong>Laporan Keluar</strong>
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
                    <h5>Laporan Transaksi Detail Keluar</h5>
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
                                    <th>Kode Keluar</th>
                                    <th>Nama Karyawan</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($keluar as $keluar)
                                <tr class="gradeA">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $keluar->KodeKeluar }}</td>                                  
                                    <td>{{ $keluar->NamaKaryawan }}</td>                                  
                                    <td>{{ $keluar->JenisBrg }}</td>                                  
                                    <td>{{ $keluar->NamaBrg }}</td>                                  
                                    <td>{{ $keluar->JumlahBrg }}</td>                                  
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