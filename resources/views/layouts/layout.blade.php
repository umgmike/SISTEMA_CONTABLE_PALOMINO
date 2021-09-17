<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('Title','Welcome') | Johhan-SYSTEM</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('uza/img/core-img/favicon.ICO') }} ">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href=" {{ asset('uza/style.css') }} ">

    <link rel="stylesheet" href=" {{ asset('css/justCard.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    @include('nav-bar')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcrumb Area Start ***** -->
    <section class="welcome-area">
            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src=" {{ asset('uza/img/core-img/curve-5.png') }} " alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-75">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            @yield('content-login')
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    @include('layouts.footer')
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

</body>

</html>



