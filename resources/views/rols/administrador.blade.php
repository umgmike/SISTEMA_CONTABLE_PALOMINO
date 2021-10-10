<section class="uza-portfolio-area" style="padding-top: 100px;">
    @section('nombre_ruta', 'Bienvenido al menú principal')
        @include('pages.navbar.button-secondary')

        <div class="portfolio-menu text-center mb-50">
            <button class="btn active" data-filter="*">Todo</button>
            <button class="btn active" data-filter=".Rols_and_users">Roles/empresas</button>
            <button class="btn" data-filter=".account">Cuentas</button>
            <button class="btn" data-filter=".daily-Accounting">Libro diario</button>
            <button class="btn" data-filter=".Mayor">Libro mayor</button>
            <button class="btn" data-filter=".Balance">Otros</button>
        </div>

        <div class="container-fluid">
            <div class="row uza-portfolio">

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Rols_and_users">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/64.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <h2><span class="counter"> {{ count($datos['AllUser']) }} </span></h2>

                                    <div class="cf-text">
                                        <h4>Usuarios</h4>
                                        <small style="font-size: 15px">Activos : <span class="counter">
                                                {{ count($datos['UserActive']) }} </span><br></small>
                                        <small style="font-size: 15px">Inactivos : <span class="counter text-danger">
                                                {{ count($datos['UserInactiveAll']) }} </span></small><br>

                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href=" {{ route('page.usuarios') }} ">Listado de usuarios</a></li>
                                            <li><a href="{{ route('page.create-users') }}">Crear nuevos usuarios</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-secondary btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Rols_and_users">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/58.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <h2><span class="counter"> {{ count($datos['AllCompany']) }} </span></h2>

                                    <div class="cf-text">
                                        <h4>Empresas</h4>
                                        <small style="font-size: 15px">Activos : <span class="counter">
                                                {{ count($datos['CompanyActive']) }} </span><br></small>
                                        <small style="font-size: 15px">Inactivos : <span class="counter text-danger">
                                                {{ count($datos['CompanyInactiveAll']) }} </span></small><br>

                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href=" {{ route('page.empresas') }} ">Listado de empresas</a></li>
                                            <li><a href=" {{ route('page.empresas.create') }} ">Crear nuevas empresas</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-secondary btn-block "></a>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item account">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/55.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <h2><span class="counter">{{ count($datos['AllCuenta']) }} </span></h2>

                                    <div class="cf-text">
                                        <h4>Cuentas</h4>
                                        <small style="font-size: 15px">Activas : <span class="counter">
                                                 {{ count($datos['CuentaActive']) }} </span><br></small>
                                        <small style="font-size: 15px">Inactivas : <span class="counter text-danger">
                                                {{ count($datos['CuentaInactiveAll']) }} </span></small><br>

                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="{{ route('page.cuentas') }}">Catálogo de cuentas</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-secondary btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item account">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/68.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <h2><span class="counter">{{ count($datos['AllCatAccounts']) }}   </span></h2>

                                    <div class="cf-text">
                                        <h4>Categoria de cuentas</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href=" {{ route('cat.list') }} ">Ver categorias</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-secondary btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item daily-Accounting">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/57.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-80">

                                    <h2><span class="counter"> {{ count($datos['AllAsiento']) }}</span></h2>
                                    <div class="cf-text">
                                        <h4>Assientos contables</h4>
                                        <small style="font-size: 15px">Registrados : <span class="counter">
                                            {{ count($datos['AsientoActive']) }} </span><br></small>
                                        <small style="font-size: 15px">Anulados : <span class="counter text-danger">
                                            {{ count($datos['AsientoInactiveAll']) }}</span></small><br>
                                    </div>
                                </div>
                            </div>
                            <div class="single-footer-widget mb-75">
                                <nav>
                                    <ul class="our-link">
                                        <li><a href=" {{ route('page.asiento-create') }}">Crear asientos</a></li>
                                        <li><a href=" {{ route('pdf_asientoLD') }} ">Libro diario</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Mayor">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/67.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <div class="cf-text">
                                        <h4>Libro mayor</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="" class="tooltipsC"
                                                    title="¿Donde desea guardar reporte Libro Mayor?">Guardar Libro
                                                    Mayor</a></li>
                                            <li><a href="" class="tooltipsC"
                                                    title="Descargar directa reporte Libro Mayor">Descargar Libro Mayor</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Balance">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/66.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">
                                    <div class="cf-text">
                                        <h4>Balance general</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Descargar balance
                                                    general</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Balance">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/37.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">
                                    <div class="cf-text">
                                        <h4>Estado de resultados</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Descargar estado de
                                                    resultados</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Balance">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/45.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">
                                    <div class="cf-text">
                                        <h4>Balance de comprobacion</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Balance de comprobacion</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Balance">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/59.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">
                                    <div class="cf-text">
                                        <h4>Inventario final</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Inventario final</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Rols_and_users">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/63.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <h2><span class="counter"></span></h2>

                                    <div class="cf-text">
                                        <h4>Roles</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Listado roles para empresas</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-secondary btn-block "></a>
                    </div>
                </div>



                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item Rols_and_users">
                    <div class="single-portfolio-slide">
                        <img src=" {{ asset('uza/img/bg-img/65.jpg') }} " alt="">
                        <div class="overlay-effect">
                            <div class="post-content" style="height: 150px">
                                <div class="single-cf-area d-flex align-items-center mb-75">

                                    <div class="cf-text">
                                        <h4>Listado General</h4>
                                    </div>
                                </div><br>
                                <div class="single-footer-widget mt-10">
                                    <nav>
                                        <ul class="our-link">
                                            <li><a href="">Ver listado</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                        <a href="" class="btn btn-info btn-block "></a>
                    </div>
                </div>


            </div>
        </div>
    </section>
