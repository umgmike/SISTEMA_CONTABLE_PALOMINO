<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <!-- Logo -->
                <a class="nav-brand" href=" {{ route('welcome') }}"><img
                        src=" {{ asset('assets/uza/img/core-img/share2.ico') }}" alt=""
                        title="Retornal al principio | SYS-JOHHAN"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>



                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            @if (Auth::check())
                                @if (Auth::user()->condicion == 1 && Auth::user()->id_rol == 1)
                                    <li class="breadcrumb-item">
                                        <a href=" {{ route('home_admin') }} "><i class="fa fa-dashboard (alias)"></i> Home </a>
                                    </li>

                                    <li><a><i class="fa fa-home"></i> Empresas</a>
                                        <ul class="dropdown">
                                            <li><a href=" {{ route('page.empresas') }} ">Listado Empresa</a></li>
                                            <li><a href="">Crear Empresa</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#"><i class="fa fa-cubes"></i> Nomenclatura</a>
                                        <ul class="dropdown">
                                            <li><a href=" {{ route('page.cuentas') }} ">Catálogo cuentas</a></li>
                                            <li><a href=" {{ route('page.create.cuentas') }} ">Crear cuentas</a></li>
                                            <li><a href=" {{ route('cat.list') }} ">Categorías</a></li>
                                            <li><a href=" {{ route('cat.create') }} ">Categorías cuentas</a></li>
                                        </ul>
                                    </li>

                                    <li class="breadcrumb-item">
                                        <a href=" {{ route('page.inicio.inventario') }} "><i class="fa fa-book"></i> Inventario</a>
                                    </li>

                                    <li><a><i class="fa fa-object-ungroup"></i> Asientos contables</a>
                                        <ul class="dropdown">
                                            <li><a href=" {{ route('page.inicio') }} " class="tooltipsC"
                                                    title="Listado de asientos contables"> Libro diario</a></li>

                                            <li><a href=" {{ route('page.asiento-create') }} " class="tooltipsC"
                                                    title="Crear nuevo asiento contable"> Crear asientos </a></li>

                                            <li><a href=" {{ route('pdf_asientoLD_download') }} " class="tooltipsC"
                                                    title="Descargar reporte libro diario"> Descargar</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#"><i class="fa fa-leaf"></i> Libro mayor</a>
                                        <ul class="dropdown">
                                            <li><a href="" class="tooltipsC"
                                                    title="Donde desea guardar reporte Libro Mayor"> Guardar L Mayor</a>
                                            </li>

                                            <li><a href="" class="tooltipsC"
                                                    title="Descarga directa reporte Libro Mayor"> Descarga directa </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="breadcrumb-item">
                                        <a href=" "><i class="fa fa-book"></i> Libro Caja</a>
                                    </li>

                                    <li><a href="#"><i class="fa fa-balance-scale"></i> Balances</a>
                                        <ul class="dropdown">
                                            <li><a href="" class="tooltipsC"
                                                    title=""> Guardar L Mayor</a>
                                            </li>

                                            <li><a href="" class="tooltipsC"
                                                    title=""> Descarga directa </a>
                                            </li>
                                        </ul>
                                    </li>

                                @endif
                            @endif

                            @if (Auth::check())
                                @if (Auth::user()->condicion == 1 && Auth::user()->id_rol == 2)
                                    <li><a href="{{ route('welcome') }}">Home</a></li>
                                @endif
                            @endif
                        </ul>

                        <ul id="nav">
                            <div data-toggle="modal" data-target="#logout-System">
                                @if (Auth::check())
                                    @if (Auth::user()->condicion == 0)
                                        <li><a>Retornar</a></li>
                                    @else
                                        <li><a>Logout</a></li>
                                    @endif
                                @endif
                            </div>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
