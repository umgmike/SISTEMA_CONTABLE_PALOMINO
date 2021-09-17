@extends('pages.layouts.layout')

@section('Title')
  Crear categoría cuenta
@endsection

@section("scripts")
<script src="{{asset("assets/pages/catCuenta/createCCuenta.js")}}" type="text/javascript"></script>
@endsection

@section('content')

@section('nombre_ruta', 'Crear categoría de cuentas | SYS-JOHHAN')
@section('dashboard_nombre', 'Listado de categorías')
@section('dashboard_ruta', route('cat.list'))
@include('pages.navbar.button-principal')

@include('includes.form-error')
@include('includes.mensaje')

<div class="container">
    <div class="row">
    	<div class="col-12 col-lg-5 offset-3">
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

		            <div class="card-header">
		                <small style="font-size:30px;  color:black">
		                    <strong>Categorias cuentas</strong><br>
		                </small>
		            </div>

		            <div class="card-body">
		                <div class="ribbon-wrapper ribbon-xl">
		                    <div class="ribbon bg-gray-light">Create category account</div>
		                </div>
		            </div>

	                <form action="{{ route('cat.save') }}" id="CreateCategoriaCuenta" method="POST" autocomplete="off">
	                	@csrf
	                    <div class="card-body">
	                        @include('pages.categoriasCuenta.form-create')
	                        <div class="text-center">
	                            <button type="submit" class="btn btn-info mt-40 btn-bg " aria-hidden="true"> Guardar categoria cuenta</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	            <a href="" class="btn btn-info btn-block "></a>
            </div>
        </div>

    </div>
</div>
@endsection 

