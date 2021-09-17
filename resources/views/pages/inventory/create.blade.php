|@extends('pages.layouts.layout')

@section('Title')
    Crear inventario final
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/inventory/inventory.js') }}" type="text/javascript"></script>
@endsection

@section('content')

@section('nombre_ruta', 'Crear inventario final | SYS-JOHHAN')
@section('dashboard_nombre', 'Retornar inventario final')
@section('dashboard_ruta', route('page.inventory'))
    @include('pages.navbar.button_a')

    @include('includes.form-error')
    @include('includes.mensaje')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 offset-4">
                <div class="single-blog-post bg-img mb-80"
                    style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
                    <div class="post-content">

                        <div class="card-header">
                            <small style="font-size:30px;  color:black">
                                <strong>Inventario Final</strong><br>
                            </small>
                        </div>

                        <div class="card-body">
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-gray-light">Create inventory</div>
                            </div>
                        </div>

                        <form action="{{ route('page.inventory.save') }}" id="InventoryCreate" method="POST"
                            autocomplete="off">
                            @csrf
                            <div class="card-body">
                                @include('pages.inventory.form-create')
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success mt-40 btn-bg " aria-hidden="true">
                                        Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
