@extends('pages.layouts.layout')

@section('Title')
	Editar usuario
@endsection

@section("scripts")
<script src="{{asset("assets/pages/users/editUser.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    @section('nombre_ruta', 'Edición de usuarios')
    @section('dashboard_nombre', 'Listado de usuarios')
    @section('dashboard_ruta', route('page.usuarios'))
    @include('pages.navbar.button-principal')


    @include('includes.form-error')
    @include('includes.mensaje')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-5 offset-1">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

                    <div class="card-header">
                        <small style="font-size:30px;  color:black">
                            <strong>Edición de usuarios</strong><br>
                        </small>
                    </div>

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-gray-light">Edit company</div>
                        </div>
                    </div>

                    <form action="{{route('page-update.users', [$registro->id])}}" id="UsuariosEdit" method="POST" autocomplete="off">
                    @csrf 
                    @method("put")

                        <div class="card-body">
                            @include('pages.users.form-edit')
                        </div>
                        <div class="text-center">
                            <button type="submit" class="col-lg-4 btn btn-outline-success mt-40 ">Actualizar</button>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-primary btn-block "></a>
            </div>
        </div>

        <div class="col-12 col-lg-5 offset-1" id="verificando_pass">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

                    <div class="card-header">
                        <small style="font-size:30px;  color:black">
                            <strong>Cambiar contraseña</strong><br>
                        </small>
                    </div>

                    @include('includes.form-error')
                    @include('includes.mensaje')

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-gray-light">New password</div>
                        </div>
                    </div>

                    <form action="{{route('page-update.users-pass', [$registro->id])}}" id="editPasswordUMG" method="POST" autocomplete="off">
                    @csrf 
                    @method("put")

                        <div class="card-body">
                            @include('pages.users.pass')
                        </div>
                        <div class="text-center">
                            <button type="submit" class="col-lg-6 btn btn-primary mt-40 ">Cambiar contraseña</button>

                            <button type="button" class="btn btn-danger mt-40" id="btn_cancelar">Cancelar</button>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-primary btn-block "></a>
            </div>
        </div>

    </div>
</div>
@endsection

@section('uza_scripts')
<script src="{{asset("assets/pages/users/editPass.js")}}" type="text/javascript"></script>
@endsection

@section('footer_scripts')
    <script type="text/javascript">
        $("#verificando_pass").hide();


        $('#btn_cambiar').click(function () {
            $("#verificando_pass").show();

        });

        $('#btn_cancelar').click(function () {
            $("#verificando_pass").hide();

        });
    </script>
@endsection