<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}"/>

    <title>Kerja Praktik</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/plugins/footable/footable.core.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/plugins/dataTables/datatables.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/plugins/datapicker/datepicker3.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/animate.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/style.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset ('/css/plugins/sweetalert/sweetalert.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset ('/css/sticky-footer-navbar.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset ('/css/sweetalert2.min.css') }}" rel='stylesheet' type='text/css'>
    <script src="{{ asset('js/jquery-2.1.1.js') }}" type='text/javascript'></script>
    <!-- new -->
    <script src="{{ asset ('/js/jquery.maskMoney.js') }}" type="text/javascript"></script>
    <script src="{{ asset ('/js/my.js') }}" type="text/javascript"></script>
</head>

<body>
    <div id="wrapper">
    @include('include.sidebar')
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                @if (session('pesan_sukses'))
                    @include('_alert.success')
                @endif

                @if (session('pesan_gagal'))
                    @include('_alert.failed')
                @endif

                @yield('konten')
            </div>
            <div class="footer">
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2015
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    
    <script src="{{ asset('js/bootstrap.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/jeditable/jquery.jeditable.js') }}" type='text/javascript'></script>

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}" type='text/javascript'></script>
    <!-- Sweet alert -->
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}" type='text/javascript'></script>
    <!-- Data picker -->
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}" type='text/javascript'></script>
    <!-- FooTable -->
    <script src="{{ asset('js/plugins/footable/footable.all.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/common.js') }}" type='text/javascript'></script>
    <!-- Flot -->
    <script src="{{ asset('js/plugins/flot/jquery.flot.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/flot/jquery.flot.time.js') }}" type='text/javascript'></script>
    <!-- Peity -->
    <script src="{{ asset('js/plugins/peity/jquery.peity.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/demo/peity-demo.js') }}" type='text/javascript'></script>
    <!-- jQuery UI -->
    <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}" type='text/javascript'></script>
    <!-- Jvectormap -->
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}" type='text/javascript'></script>
    <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type='text/javascript'></script>
    <!-- EayPIE -->
    <script src="{{ asset('js/plugins/easypiechart/jquery.easypiechart.js') }}" type='text/javascript'></script>
    <!-- Sparkline -->
    <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js') }}" type='text/javascript'></script>
    <!-- Sparkline demo data  -->
    <script src="{{ asset('js/demo/sparkline-demo.js') }}" type='text/javascript'></script>
    <!-- Page-Level Scripts -->
    
</body>
</html>
