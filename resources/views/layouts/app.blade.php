<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIO | Sistema informativo organizacional</title>

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lightbox2/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Data Tables -->
    <link href="{{ asset('plugins/datatables/datatables.responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/datatables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--  Select2 -->
    <link rel="stylesheet" type="text/css" href="{{url('plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('plugins/select2/select2-bootstrap.min.css')}}">

    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="{{url('plugins/dropzone/min/dropzone.min.css')}}">

    @yield('styles')

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="icon" href="{{ url('favicon.ico') }}">

   

</head>

<body class="">
    <div id="wrapper">
        @include('layouts.sidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenido a SIO.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                            </a>

                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                        </li>
                        
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="breadcrumbs row wrapper border-bottom white-bg page-heading">
                @yield("breadcrumb")
            </div>

            <div class="wrapper wrapper-content animated fadeInRightBig">

                @yield("content")

            </div>
            <div class="footer">
                <div class="pull-right">
                    <strong>Geostigma Media </strong>&copy; 2018
                </div>
                <div>
                    <strong>SENA REGIONAL CAUCA</strong>
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('plugins/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/validate/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/validate/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/validate/localization/messages_es.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/metisMenu/jquery.metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datapicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/lightbox2/js/lightbox.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery.mask.min.js') }}" type="text/javascript"></script>
    <!-- Data Tables -->
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>

    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/app/config.js') }}"></script>


    


    @yield('scripts')



</body>

</html>

