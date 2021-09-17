@extends('pages.layouts.layout')

@section('Title')
	Editar naturaleza de cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/account/account.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    @section('nombre_ruta', 'Edición de naturaleza de cuentas')
    @section('dashboard_nombre', 'Catálogo de cuentas')
    @section('dashboard_ruta', route('page.cuentas'))
    @include('pages.navbar.button-thirth')


    @include('includes.form-error')
    @include('includes.mensaje')

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 offset-3">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

                    <div class="card-header">
                        <small style="font-size:30px;  color:black">
                            <strong>Edición de naturaleza cuenta</strong><br>
                        </small>
                    </div>

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-gray-light">Edit naturality account</div>
                        </div>
                    </div>

                    <form action="{{route('page-update.naturality', [$registro->id])}}" id="GuardarNaturaleza" method="POST" autocomplete="off">
                    @csrf 
                    @method("put")

                        <div class="card-body">
                            @include('pages.accounts.form-edit-naturaleza')
                        </div>
                        <div class="text-center">
                            <button type="submit" class="col-lg-4 btn btn-primary mt-35 ">Actualizar</button>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-info btn-block "></a>
            </div>
        </div>

    </div>
</div>
@endsection
