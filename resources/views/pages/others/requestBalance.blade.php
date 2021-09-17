@extends('pages.layouts.layout')

@section('Title')
    Crear reporte
@endsection

@section('content')
@section('nombre_ruta', 'Crear reportes de comprobación')
@section('dashboard_nombre', 'Catálogo de asientos contables')
@section('dashboard_ruta', route('page.inicio'))
    @include('pages.navbar.button-secondary')

    <div class="col-12 col-lg-7 offset-3">
        <div class="single-blog-post bg-img mb-80" style="background-image: url({{ asset('uza/img/bg-img/45.jpg') }});">
            <div class="post-content">

                <div class="card-header">
                    <small style="font-size:30px;  color:black">
                        <strong>Crear reporte Balance General</strong><br>
                    </small>
                </div>

                <div class="card-body">
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-gray-light">Create reports</div>
                    </div>
                </div>

                <form action="{{ route('Balance.General') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <label for="formGroupExampleInput2">Fecha de balance de comprobación (Inicial)</label>
                        <input type="date" class="form-control" name="fechai" min="1000-01-01" max="2050-12-31"
                            value="2020-01-01" required><br>

                        <label for="formGroupExampleInput2">Fecha de balance de comprobación (Final)</label>
                        <input type="date" class="form-control" name="fechaf" min="1000-01-01" max="2050-12-31"
                            value="2020-12-31" required>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-outline-danger" value="Generar Reporte">
                        <a href="{{ route('page.inicio') }}" class="btn btn-outline-primary">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
