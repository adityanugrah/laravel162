<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{url('/img/profile_small.png')}}" />
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="{{ Request::is('dashboard') || Request::is('dashboard/*') ? 'active' : '' }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
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
                <i class="fa fa-bar-chart-o"></i> 
                <span class="nav-label">Data Supplier</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Transaksi</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="form_basic.html">Transaksi Masuk</a></li>
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="form_advanced.html">Transaksi Keluar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="form_basic.html">Laporan Bulanan</a></li>
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="form_advanced.html">Laporan Mingguan</a></li>
                    <li class="{{ Request::is('databarang/tools') || Request::is('databarang/tools/*') ? 'active' : '' }}"><a href="form_wizard.html">Laporan Harian</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>