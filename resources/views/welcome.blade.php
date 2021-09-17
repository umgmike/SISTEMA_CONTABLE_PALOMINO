<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('Title','Welcome') | OFICINA CONTABLE PALOMINO</title>
        <!-- Favicon -->
        
        <link rel="icon" href=" {{ asset('uza/img/core-img/favicon.ico') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="{{ asset('uza/style.css') }} ">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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

    <!-- ***** Header Area Start ***** -->
    @include('nav-bar')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src=" {{ asset('uza/img/core-img/curve-1.png') }} " alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-75">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                    <h2 >Sistema Contable <span>PALOMINO</span></h2>
                                    @if (Route::has('login'))
                                        @auth
                                            <h5 >Usted esta logeado estimad@: <strong>" {{ Auth::user()->nombre }}  {{ Auth::user()->apellido }}"</strong></h5>
                                        @else
                                            <h5 >Accounting system</h5>
                                        @endauth
                                    @endif
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('home') }}" class="btn uza-btn btn-2 tooltipsC"  title="Presione para ir al menú de Inicio">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn uza-btn btn-2"> Login</a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="{{ asset('uza/img/bg-img/2.png') }} " alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src="{{ asset('uza/img/core-img/curve-1.png') }} " alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-75">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                    <h2 >Sistema Contable <span>PALOMINO</span></h2>
                                    @if (Route::has('login'))
                                        @auth
                                            <h5 >Usted esta logeado estimad@: <strong>" {{ Auth::user()->nombre }}  {{ Auth::user()->apellido }}"</strong></h5>
                                        @else
                                            <h5 >Accounting system</h5>
                                        @endauth
                                    @endif
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('home') }}" class="btn uza-btn btn-2 tooltipsC"  title="Presione para ir al menú de Inicio">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn uza-btn btn-2"> Login</a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="{{ asset('uza/img/bg-img/3.png') }} " alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Background Curve -->
                <div class="background-curve">
                    <img src="{{ asset('uza/img/core-img/curve-1.png') }} " alt="">
                </div>

                <!-- Welcome Content -->
                <div class="welcome-content h-75">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-text">
                                    <h2 >Sistema Contable <span>PALOMINO</span></h2>
                                    @if (Route::has('login'))
                                        @auth
                                            <h5 >Usted esta logeado estimad@: <strong>" {{ Auth::user()->nombre }}  {{ Auth::user()->apellido }}"</strong></h5>
                                        @else
                                            <h5 >Accounting system</h5>
                                        @endauth
                                    @endif
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('home') }}" class="btn uza-btn btn-2 tooltipsC"  title="Presione para ir al menú de Inicio">Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn uza-btn btn-2"> Login</a>
                                        @endauth
                                    @endif
                                </div>
                            </div>
                            <!-- Welcome Thumbnail -->
                            <div class="col-12 col-md-6">
                                <div class="welcome-thumbnail">
                                    <img src="{{ asset('uza/img/bg-img/4.png') }} " alt="" data-animation="slideInRight" data-delay="400ms">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-75-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-75">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Contáctanos</h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h3>(+502) 40802648</h3>
                            <p>SLT, Guatemala <br> ajacintog1@miumg.edu.gt</p>
                        </div>
                    </div>
                </div>


                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Desarrollador Web</h4>
                        <p>Ana Steffanny Jacinto</p>
                        <p>Cada linea de código, es significativo para cada proceso...</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p>&copy; Copyright <script>document.write(new Date().getFullYear());</script> <a href="{{ route('login') }}">All rights reserved | OFICINA CONTABLE PALOMINO</a>.</p>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>

            </div>

             <div class="row" style="margin-bottom: 30px;"> 
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | OFICINA CONTABLE PALOMINO
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src=" {{ asset('uza/js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src=" {{ asset('uza/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src=" {{ asset('uza/js/bootstrap.min.js') }}"></script>
    <!-- All js -->
    <script src=" {{ asset('uza/js/uza.bundle.js') }}"></script>
    <!-- Active js -->
    <script src=" {{ asset('uza/js/default-assets/active.js') }}"></script>

    

</body>
</html>
