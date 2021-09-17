@extends('pages.layouts.layout')

@section('Title')
	Editar categorias de cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/catCuenta/edit.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    @section('nombre_ruta', 'Edición de cateorias de cuentas')
    @section('dashboard_nombre', 'Listado de categorias cuentas')
    @section('dashboard_ruta', route('cat.list'))
    @include('pages.navbar.button-thirth')


    @include('includes.form-error')
    @include('includes.mensaje')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-5 offset-3">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

                    <div class="card-header">
                        <small style="font-size:30px;  color:black">
                            <strong>Edición de categoria cuenta</strong><br>
                        </small>
                    </div>

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-gray-light">Edit category account</div>
                        </div>
                    </div>

                    <form action="{{route('cat-update', [$registro->id])}}" id="EditarCategoriaCuenta" method="POST" autocomplete="off">
                    @csrf 
                    @method("put")

                        <div class="card-body">
                            @include('pages.categoriasCuenta.form-edit')
                        </div>
                        <div class="text-center">
                            <button type="submit" class="col-lg-4 btn btn-secondary mt-35 ">Actualizar</button>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-danger btn-block "></a>
            </div>
        </div>

    </div>
</div>
@endsection
