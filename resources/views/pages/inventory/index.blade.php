@extends('pages.layouts.layout')

@section('Title')
    Inventario Final
@endsection

@section('scripts')
    <script src="{{ asset('assets/pages/scripts/admin/index.js') }}" type="text/javascript"></script>
@endsection

@section('content')
@section('nombre_ruta', 'Catálogo de Inventario Final')
@section('dashboard_nombre', 'Listado general')
@section('dashboard_ruta', route('pages.list-general'))
    @include('pages.navbar.button-secondary')

    <div class="portfolio-menu text-center mb-30">
        <div class="col-lg-3">
            <a href="{{ route('page.inventory.create') }}" class="btn btn-primary btn-block tooltipsC"
                title="Crear inventario Final">
                <i class="fa fa-fw fa-plus-circle"></i> Crear inventario Final
            </a>
        </div>
    </div>

    @include('includes.form-error')
    @include('includes.mensaje')

    <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
        <div class="single-portfolio-slide">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        <small style="font-size:30px;  color:black">
                            <strong>CATÁLOGO DE INVENTARIO FINAL | SYS-JOHHAN</strong>
                        </small>
                    </div>
                    <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
                        <a data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header text-center">
                                @if (count($inventatio_final) == 1)
                                    {{ count($inventatio_final) }} registro
                            </li>
                        <li class="header text-center">@elseif (count($inventatio_final) == '')
                                {{ count($inventatio_final) }} ningun registro</li>
                        <li class="header text-center">@elseif (count($inventatio_final) != '')
                                {{ count($inventatio_final) }} registros</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-gray-light">Inventory</div>
                    </div>

                    <table class="table" id="TableStyle">
                        <thead>
                            <tr>
                                <th scope="col" class="txt-center">#</th>
                                <th scope="col" class="txt-center">Fecha</th>
                                <th scope="col" class="txt-center">Monto total</th>
                                <th scope="col" class="txt-center">Descripcion</th>
                                <th scope="col" class="txt-center">Estado</th>
                                <th scope="col" class="txt-center">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($inventatio_final as $item)
                                <tr>
                                    <td> {{ $item->id }} </td>
                                    <td> {{ $item->fecha_inventario }} </td>
                                    <td>Q. {{ number_format($item->monto, 2) }} </td>
                                    @if ($item->descripcion == null)
                                        <td> Ninguna </td>
                                    @else
                                        <td> {{ $item->descripcion }} </td>
                                    @endif
                                    <td>
                                        @if ($item->condicion == 1)
                                            <button type="submit" class="btn btn-outline-info btn-sm tooltipsC"
                                                title="Registro activo">
                                                <i class="fa fa-check-circle-o"> Activo</i>
                                            </button>
                                        @elseif($item->condicion == 0)
                                            <button type="submit" class="btn btn-outline-danger btn-sm  tooltipsC"
                                                title="Registro Inactivo">
                                                <i class="fa fa-times-circle-o"> Inactivo</i>
                                            </button>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if ($item->condicion == 1)
                                            <a href="{{ route('page.inventory.edit', ['id' => $item->id]) }}"
                                                class=" tooltipsC"
                                                title="Editar monto: {{ number_format($item->monto, 2) }}">
                                                <i class="fa fa-edit btn btn-outline-info btn-sm"></i>
                                            </a>
                                        @endif

                                        @if ($item->condicion == 1)
                                            <form action="{{ route('page.inventory.delete', ['id' => $item->id]) }}"
                                                class="d-inline form-eliminar" method="POST">
                                                @csrf @method("delete")
                                                <button type="submit"
                                                    class="btn btn-outline-danger btn-sm  btn-accion-tabla eliminar tooltipsC"
                                                    title="Desactivar registro">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        @else
                                            <form action="{{ route('page.inventory.delete', ['id' => $item->id]) }}"
                                                class="d-inline form-eliminar" method="POST">
                                                @csrf @method("delete")
                                                <button type="submit"
                                                    class="btn btn-outline-success btn-sm  btn-accion-tabla eliminar tooltipsC"
                                                    title="Activar registro">
                                                    <i class="fa fa-recycle"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col" class="txt-center">#</th>
                                <th scope="col" class="txt-center">Fecha</th>
                                <th scope="col" class="txt-center">Monto total</th>
                                <th scope="col" class="txt-center">Descripcion</th>
                                <th scope="col" class="txt-center">Estado</th>
                                <th scope="col" class="txt-center">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a href="" class="btn btn-primary btn-block "></a>
            </div>
        </div>
    </div>
@endsection
