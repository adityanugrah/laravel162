<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kerja Pratik</title>

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <!-- Toastr style -->
    <link href="{{ url('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Gritter -->
    <link href="{{ url('js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet" type="text/css" />
    <!-- Data Tables -->
    <link href="{{ url('css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Alert -->
    <link href="{{ url('css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="wrapper">
        @include('include.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('include.navigation')
            
            @if (session('pesan_sukses'))
                @include('_alert.success')
            @endif

            @if (session('pesan_gagal'))
                @include('_alert.failed')
            @endif
            
            @yield('konten')

            <div class="row">
                @include('include.footer')
            </div>
        </div>
    </div>>

    <!-- Mainly scripts -->
    <script src="{{ url('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('js/plugins/jeditable/jquery.jeditable.js') }}"></script>
    <!-- Data Tables -->
    <script src="{{ url('js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('js/plugins/dataTables/dataTables.responsive.js') }}"></script>
    <script src="{{ url('js/plugins/dataTables/dataTables.tableTools.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ url('js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ url('js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ url('js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ url('js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <!-- Peity -->
    <script src="{{ url('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('js/demo/peity-demo.js') }}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js') }}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ url('js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- GITTER -->
    <script src="{{ url('js/plugins/gritter/jquery.gritter.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Sparkline demo data  -->
    <script src="{{ url('js/demo/sparkline-demo.js') }}"></script>
    <!-- ChartJS-->
    <script src="{{ url('js/plugins/chartJs/Chart.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ url('js/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Alert -->
    <script src="{{ url('js/sweetalert2.min.js') }}"></script>
    <script src="{{ url('js/common.js') }}"></script>
    <!-- Peity -->
    <script src="{{ url('js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('js/demo/peity-demo.js') }}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
    <style>
        body.DTTT_Print {
            background: #fff;

        }
        .DTTT_Print #page-wrapper {
            margin: 0;
            background:#fff;
        }

        button.DTTT_button, div.DTTT_button, a.DTTT_button {
            border: 1px solid #e7eaec;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }
        button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
            border: 1px solid #d2d2d2;
            background: #fff;
            color: #676a6c;
            box-shadow: none;
            padding: 6px 8px;
        }

        .dataTables_filter label {
            margin-right: 5px;

        }
    </style>

    </body>
</html>
