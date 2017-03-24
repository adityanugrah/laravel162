<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kerja Praktik</title>

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- FooTable -->
    <link href="{{url('css/plugins/footable/footable.core.css')}}" rel="stylesheet">

    <link href="{{url('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <link href="{{url('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <link href="{{url('css/animate.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        @include('include.sidebar')
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right"  style="margin-top: 2%">
                        <li>
                            <div class="dropdown profile-element">
                                <a data-toggle="dropdown" class="dropdown-toggle" >
                                    <strong class="font-bold">{{ Auth::user()->name }} </strong>
                                    <b class="caret"></b>
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
                        </li>
                    </ul>
                </nav>
            </div>
            
            @if (session('pesan_sukses'))
                @include('_alert.success')
            @endif

            @if (session('pesan_gagal'))
                @include('_alert.failed')
            @endif
            
            @yield('konten')

            <div class="row">
                <div class="footer">
                    <div>
                        <strong>Copyright</strong> Junior Blogger &copy; 1997-2017
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{url('js/jquery-2.1.1.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('js/plugins/jeditable/jquery.jeditable.js')}}"></script>

    <script src="{{url('js/plugins/dataTables/datatables.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('js/inspinia.js')}}"></script>
    <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>

    <!-- Data picker -->
    <script src="{{url('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <!-- FooTable -->
    <script src="{{url('js/plugins/footable/footable.all.min.js')}}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

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

</body>

</html>

