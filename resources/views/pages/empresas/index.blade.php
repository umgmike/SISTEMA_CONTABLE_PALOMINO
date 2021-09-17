@extends('pages.layouts.layout')

@section('Title')
  Empresas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  @section('nombre_ruta', 'Listado de Empresas')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-secondary')

	<div class="portfolio-menu text-center mb-30">
    	<div class="col-lg-3">
      		<a href="{{ route('page.create-users') }}" class="btn btn-primary btn-block tooltipsC" title="Crear nueva empresa">
        		<i class="fa fa-fw fa-plus-circle"></i> Crear nueva empresa
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
                <strong>CATÁLOGO DE EMPRESAS | OFIS. CONTABLE PALOMINO</strong>
              </small>
        </div>
        <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
            <a data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">@if (count($empresas) == 1) {{count($empresas)}} registro </li>
              <li class="header text-center">@elseif (count($empresas) == '') {{count($empresas)}} ningun registro</li>
              <li class="header text-center">@elseif (count($empresas) != '') {{count($empresas)}} registros</li> @endif
            </ul>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Users</div>
        </div>

        <table class="table" id="TableStyle">
          <thead>
            <tr>
              <th scope="col" class="txt-center">Nombre Establecimiento</th>
              <th scope="col" class="txt-center">Regimen</th>
              <th scope="col" class="txt-center">Contribuyente</th>
              <th scope="col" class="txt-center">NIT</th>
              <th scope="col" class="txt-center">Año Contable</th>
              <th scope="col" class="txt-center">Estado</th>
              <th scope="col" class="txt-center">Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($empresas as $item)
              <tr>
              	<td> {{ $item->nombre_establecimiento }} </strong></td>
                <td> {{ $item->regimenes->nombre_regimen }} </strong></td>
                <td> {{ $item->contribuyente->nombre }} {{ $item->contribuyente->apellido }} </strong></td>
                <td> {{ $item->nit }} </td>
                <td class="text-center"> {{ $item->anyo_contable }}  </td>
                <td>
                  @if($item->condicion == 1)
                    <button type="submit" class="btn btn-outline-info btn-sm tooltipsC" title="Registro activo">
                      <i class="fa fa-check-circle-o"> Activo</i>
                    </button>
                  @elseif($item->condicion == 0)
                    <button type="submit" class="btn btn-outline-danger btn-sm  tooltipsC" title="Registro Inactivo">
                      <i class="fa fa-times-circle-o"> Inactivo</i>
                    </button>
                  @endif
                </td>

                <td class="text-center">
                  @if($item->condicion == 1)
                      <a href="{{ route('page-edit.users', ['id' => $item->id])}}" class=" tooltipsC" title="Editar registro">
                        <i class="fa fa-edit btn btn-outline-info btn-sm"></i>
                      </a>
                  @endif

                  @if($item->condicion == 1)
                    <form action="{{route('page.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                      @csrf @method("delete")
                      <button type="submit" class="btn btn-outline-danger btn-sm  btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                          <i class="fa fa-trash"></i>
                      </button>
                    </form>

                  @else
                    <form action="{{route('page.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                      @csrf @method("delete")
                      <button type="submit" class="btn btn-outline-success btn-sm  btn-accion-tabla eliminar tooltipsC" title="Activar registro">
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
              <th scope="col" class="txt-center">Nombre Establecimiento</th>
              <th scope="col" class="txt-center">Regimen</th>
              <th scope="col" class="txt-center">Contribuyente</th>
              <th scope="col" class="txt-center">NIT</th>
              <th scope="col" class="txt-center">Año Contable</th>
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