<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title> {{ Auth::user()->nombre }} | OFICINA CONTABLE PALOMINO</title>

    <!-- Favicon -->
    <link rel="icon" href=" {{ asset('uza/img/core-img/favicon.ICO') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href=" {{ asset('uza/style.css') }} ">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Top Search Area Start ***** -->
    @include('rols.logoutApp')
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('rols.nav-bar')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcrumb Area Start ***** -->
    @if(Auth::check())
        @if ((Auth::user()->id_rol == 1) && (Auth::user()->condicion == 1))
            @include('rols.administrador')
        @elseif((Auth::user()->id_rol == 2) && (Auth::user()->condicion == 1))
            @include('rols.sub_administrador')
        @elseif((Auth::user()->id_rol == 3) && (Auth::user()->condicion == 1))
            @include('rols.standard')
        @elseif (Auth::user()->condicion == 0)
            @include('rols.inactivos')
            @php
                toast('Lo sentimos : '. Auth::user()->nombre.' '.Auth::user()->apellido. ' '.' su cuenta esta inactiva','error')->timerProgressBar()->autoClose(8000);
            @endphp
        @endif
    @endif
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    @include('rols.footer')
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src=" {{ asset('uza/js/jquery.min.js') }} "></script>
    <!-- Popper js -->
    <script src=" {{ asset('uza/js/popper.min.js') }} "></script>
    <!-- Bootstrap js -->
    <script src=" {{ asset('uza/js/bootstrap.min.js') }} "></script>
    <!-- All js -->
    <script src=" {{ asset('uza/js/uza.bundle.js') }} "></script>
    <!-- Active js -->
    <script src=" {{ asset('uza/js/default-assets/active.js') }} "></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>

</html>