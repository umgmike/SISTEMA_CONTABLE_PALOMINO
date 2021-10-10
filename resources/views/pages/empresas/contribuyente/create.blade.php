@extends('pages.layouts.layout')

@section('Title')
  Crear contribuyente
@endsection

@section("scripts")
<script src="{{asset("assets/pages/companies/contribuyente.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    @section('nombre_ruta', 'Creación de contribuyentes')
    @section('dashboard_nombre', 'Listado de contribuyentes')
    @section('dashboard_ruta', route('page.empresas'))
    @include('pages.navbar.button-principal')


    @include('includes.form-error')
    @include('includes.mensaje')

    <div class="row ">
        <div class="col-lg-6 offset-3"> 
            <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                <div class="post-content">

                    <div class="card-header">
                        <div class="text-center">
                            <small style="font-size:30px;  color:black">
                                <strong>Oficina Contable Palomino</strong>
                            </small>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-gray-light">Contribuyente</div>
                        </div>
                    </div>

                    <form action="{{ route('page.contribuyente.save') }}" id="ContribuyenteCreate" method="POST" autocomplete="off">
                    @csrf
                        <div class="card-body">
                            @include('pages.empresas.contribuyente.form-create')
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-info mt-40" aria-hidden="true" class="tooltipsC" title="Guardar registros"> Guardar </button>
                                
                                <a href=" {{ route('page.empresas.create') }}" class="btn btn-outline-success mt-40" aria-hidden="true" class="tooltipsC" title="Guardar registros"> Cancelar </a>
    

                            </div>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-info btn-block"></a>
            </div>
        </div>
    </div>
@endsection