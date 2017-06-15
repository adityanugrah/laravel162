@extends('welcome')
@section('konten')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Seragam</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{ $serag->sum('StokAkhir') }}
                </h1><br/>
                <small>Total Stok</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!-- <span class="label label-info pull-right">Annual</span> -->
                <h5>Preused</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{ $pre->sum('StokAkhir') }}
                </h1><br/>
                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                <small>Total Stok</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!-- <span class="label label-primary pull-right">Today</span> -->
                <h5>Tools</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{ $tools->sum('StokAkhir') }}
                </h1><br/>
                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                <small>Total Stok</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!-- <span class="label label-danger pull-right">Low value</span> -->
                <h5>Loker</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">
                    {{ $loker->sum('StokAkhir') }}
                </h1><br/>
                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> -->
                <small>Total Stok</small>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<h4>Warning !!! Segera Lalukan Restock Barang</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($serag as $ser)
                            <tr>
                            @if ($ser->StokAkhir < 100) 
                                <td>{{ $i++ }}</td>
                                <td>{{$ser->NamaSeragam}} ({{$ser->Ukuran}})</td>
                                <td>{{$ser->StokAkhir}}</td>
                                @endif
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