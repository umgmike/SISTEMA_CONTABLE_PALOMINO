<form>
    <div class="row">
        <div class="col-lg-6 col-md-6">
           <h3>@yield('nombre_ruta') <small style="color: #C9CDC9"></small></h3>
        </div>

        <div class="col-lg-3 col-md-3">
            <a  href="{{ route('home_admin') }}"
                class="btn btn-outline-danger btn-block float-right">
                <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            </a>
        </div>
        <div class="col-lg-3 col-md-3">
            <a  href="@yield('dashboard_ruta')"
                class="btn btn-outline-primary btn-block float-right">
                <i class="fa fa-home" aria-hidden="true"></i> @yield('dashboard_nombre')
            </a>
        </div>
    </div>  
    <br>
</form>