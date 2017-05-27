<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{url('/img/profile_small.jpg')}}" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                        <span class="block m-t-xs">
                            @if(Auth::check())
                            <strong class="font-bold">
                                {{ Auth::user()->name }}
                            </strong>
                            @endif
                        </span>
                        <span class="text-muted text-xs block">Logout <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    KP
                </div>
            </li>
            <li class="{{ Request::is('/') || Request::is('/*') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                <i class="fa fa-th-large"></i> 
                <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{ Request::is('databarang') || Request::is('databarang/*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Data Barang</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('databarang/seragam') || Request::is('databarang/seragam/*') ? 'active' : '' }}"><a href="{{ url('databarang/seragam') }}">Seragam Baru</a></li>
                    <li class="{{ Request::is('databarang/preused') || Request::is('databarang/preused/*') ? 'active' : '' }}"><a href="{{ url('databarang/preused') }}">Pre - used</a></li>
                    <li class="{{ Request::is('databarang/loker') || Request::is('databarang/loker/*') ? 'active' : '' }}"><a href="{{ url('databarang/loker') }}">Loker</a></li>
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="{{ url('databarang/tools') }}">Tools</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('supplier') || Request::is('supplier/*') ? 'active' : '' }}">
                <a href="{{ url('/supplier') }}">
                <i class="fa fa-shopping-cart"></i> 
                <span class="nav-label">Data Supplier</span></a>
            </li>
            <li class="{{ Request::is('departemen') || Request::is('departemen/*') ? 'active' : '' }}">
                <a href="{{ url('/departemen') }}">
                <i class="fa fa-building"></i> 
                <span class="nav-label">Data Departemen</span></a>
            </li>
            <li class="{{ Request::is('karyawan') || Request::is('karyawan/*') ? 'active' : '' }}">
                <a href="{{ url('/karyawan') }}">
                <i class="fa fa-users"></i> 
                <span class="nav-label">Data Karyawan</span></a>
            </li>
            <li class="{{ Request::is('transaksi') || Request::is('transaksi/*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-exchange"></i> <span class="nav-label">Transaksi</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('transaksi/transaksimasuk') || Request::is('transaksi/transaksimasuk/*') ? 'active' : '' }}"><a href="{{ url('transaksi/transaksimasuk') }}">Transaksi Masuk</a></li>
                    <li class="{{ Request::is('transaksi/transaksikeluar') || Request::is('transaksi/transaksikeluar/*') ? 'active' : '' }}"><a href="{{ url('transaksi/transaksikeluar') }}">Transaksi Keluar</a></li>
                    <li class="{{ Request::is('transaksi/transaksikembali') || Request::is('transaksi/transaksikembali/*') ? 'active' : '' }}"><a href="{{ url('transaksi/transaksikembali') }}">Pengembalian Barang</a></li>
                </ul>
            </li>
             <li class="{{ Request::is('laporan') || Request::is('laporan/*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('laporan/laporanmasuk') || Request::is('laporan/laporanmasuk/*') ? 'active' : '' }}"><a href="{{ url('laporan/laporanmasuk') }}">Laporan Masuk</a></li>
                    <li class="{{ Request::is('laporan/laporankeluar') || Request::is('laporan/laporankeluar/*') ? 'active' : '' }}"><a href="{{ url('laporan/laporankeluar') }}">Laporan Keluar</a></li>
                    <li class="{{ Request::is('laporan/laporankembali') || Request::is('laporan/laporankembali/*') ? 'active' : '' }}"><a href="{{ url('laporan/laporankembali') }}">Laporan Kembali</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>