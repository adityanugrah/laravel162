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
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Data Barang</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ url('/seragam') }}">Seragam Baru</a></li>
                    <li><a href="{{ url('/preused') }}">Pre - used</a></li>
                    <li><a href="{{ url('/loker') }}">Loker</a></li>
                    <li><a href="{{ url('/tools') }}">Tools</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Data Supplier</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Transaksi</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="form_basic.html">Transaksi Masuk</a></li>
                    <li><a href="form_advanced.html">Transaksi Keluar</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="form_basic.html">Laporan Bulanan</a></li>
                    <li><a href="form_advanced.html">Laporan Mingguan</a></li>
                    <li><a href="form_wizard.html">Laporan Harian</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>