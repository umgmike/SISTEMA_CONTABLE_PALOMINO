<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Listado General | SYS-JOHHAN</title>

    <!-- Favicon -->
    <link rel="icon" href=" {{ asset('uza/img/core-img/favicon.ico') }} ">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('uza/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <link href="{{ asset('libs/Ionicons/css/ionicons.css') }}" rel="stylesheet">


    <style>
        .breakpoint-off .classynav ul li .dropdown {
            width: 410px;
        }

        .texto-custom {
            color: #343a40;
            font-size: 32px;
            font-family: "Lato", "Helvetica Neue", Arial, sans-serif;
            font-weight: 700;
        }

        .pd-menu {
            padding-top: 10px;
        }

    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>


    <!-- ***** Top Search Area Start ***** -->
    @include('pages.layouts.exitApp')
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('rols.nav-bar')
    <!-- ***** Header Area End ***** -->

    <div style="margin-top: 70px">
        <br>
    </div>

    <div class="slim-mainpanel">
        <div class="container">
            <div class="slim-pageheader">
                <ol class="breadcrumb slim-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home_admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listado General</li>
                </ol>
                <h6 class="slim-pagetitle">Listado General de rutas del sistema.</h6>
            </div><!-- slim-pageheader -->

            <!-- Contenido -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('home_admin') }}" class="btn btn-primary btn-block float-right">
                        <i class="fa fa-tachometer " aria-hidden="true"></i> Retornar al Dashborad
                    </a>
                    <br>
                </div>
            </div>

            <br>


            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post bg-img mb-80"
                            style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                            <div class="post-content">

                                <div class="text-center">
                                    <small style="font-size:30px;  color:black">
                                        <strong>Rutas principales</strong><br>
                                    </small>
                                </div>

                                <form action="/">
                                    <div class="card-body">
                                        <ol class="dropdown">

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-success" href="{{ route('page.cuentas') }}">
                                                    1 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Listado de
                                                    cuentas contables. </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-danger"
                                                    href="{{ route('page.create.cuentas') }}">
                                                    2 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Crear cuentas
                                                    contables. </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-warning" href="{{ route('page.inicio') }}">
                                                    3 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Libro diario.
                                                </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-info" href="{{ route('page.inicio') }}">
                                                    4 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Descargar
                                                    reporte Libro diario. </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-primary" href="{{ route('LibroMayor') }}">
                                                    5 . <i class="fa fa-line-chart" aria-hidden="true"></i> ¿Dónde desea
                                                    guardar reporte Libro Mayor ?</a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('DescargarLibroMayor') }}">
                                                    6 . <i class="fa fa-line-chart" aria-hidden="true"></i> Descarga
                                                    directa reporte Libro Mayor </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('pages.balance.general.request') }}">
                                                    7 . <i class="fa fa-pie-chart" aria-hidden="true"></i> Balance
                                                    general </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('pages.estado-de-resultados') }}">
                                                    8 . <i class="fa fa-pie-chart" aria-hidden="true"></i> Estado de
                                                    resultados </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-success" href="{{ route('page.serch') }}">
                                                    9 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Balance de
                                                    comprobacion. </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-danger"
                                                    href="{{ route('page.inventory') }}">
                                                    10 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Inventario
                                                    Final. </a>
                                            </li>
                                        </ol>

                                    </div>
                                </form>
                            </div>
                            <a href="" class="btn btn-info btn-block "></a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post bg-img mb-80"
                            style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                            <div class="post-content">

                                <div class="text-center">
                                    <small style="font-size:30px;  color:black">
                                        <strong>Rutas secundarias</strong><br>
                                    </small>
                                </div>

                                <form action="/">
                                    <div class="card-body">
                                        <ol class="dropdown">
                                            <li class="pd-menu">
                                                <a class="btn btn-outline-primary"
                                                    href="{{ route('page.rols-user') }}">
                                                    1 . <i class="fa fa-bar-chart" aria-hidden="true"></i> Listado de
                                                    roles de empresas. </a>
                                            </li>

                                            <li class="pd-menu">
                                                <a class="btn btn-outline-secondary"
                                                    href="{{ route('page.usuarios') }}">
                                                    2 . <i class="fa fa-area-chart" aria-hidden="true"></i> Listado de
                                                    empresas SYS-JOHHAN. </a>
                                            </li>

                                        </ol>
                                    </div>
                                </form>
                            </div>
                            <a href="" class="btn btn-info btn-block "></a>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- container -->
    </div><!-- slim-mainpanel -->


    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">
            </div>

            <div class="row" style="margin-bottom: 30px;">
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());

                </script> All rights reserved | SYSTEM-JOHHAN
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->


    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="{{ asset('uza/js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('uza/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('uza/js/bootstrap.min.js') }}"></script>
    <!-- All js -->
    <script src="{{ asset('uza/js/uza.bundle.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('uza/js/default-assets/active.js') }}"></script>



</body>

</html>
