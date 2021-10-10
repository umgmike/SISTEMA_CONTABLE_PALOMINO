@extends('pages.layouts.layout')

@section('Title')
  Crear empresa
@endsection

@section("scripts")
<script src="{{asset("assets/pages/companies/new-companies.js")}}" type="text/javascript"></script>
@endsection

@section('content')
    @section('nombre_ruta', 'Creación de empresas')
    @section('dashboard_nombre', 'Listado de empresas')
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
                            <div class="ribbon bg-gray-light">Create companies</div>
                        </div>
                    </div>

                    <form action="{{ route('page.empresas.save') }}" id="CompanyCreate" method="POST" autocomplete="off">
                    @csrf
                        <div class="card-body">
                            @include('pages.empresas.form-create')
                            <div class="text-center">
                                @if (count($regimen) && count($contribuyente))
                                    <button type="submit" class="btn btn-outline-info mt-40" aria-hidden="true" class="tooltipsC" title="Guardar registros"> Guardar </button>
                                @elseif ($regimen != '' && $contribuyente != '')
                                    <button type="reset" class="btn bg-gray btn-sm">Cancelar</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <a href="" class="btn btn-danger btn-block"></a>
            </div>
        </div>
    </div>
@endsection