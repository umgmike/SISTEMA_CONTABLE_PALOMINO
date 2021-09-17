@extends('pages.layouts.layout')

@section('Title')
  Catálogo de Cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

  @section('nombre_ruta', 'Catálogo de cuentas contables')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-thirth')

  <div class="portfolio-menu text-center mb-30">
      <div class="col-lg-4">
          <a href="{{ route('page.create.cuentas') }}" class="btn btn-success btn-block tooltipsC" title="Crear nueva cuenta contable">
            <i class="fa fa-fw fa-plus-circle"></i> Crear nueva cuenta contable
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
                <strong>CATÁLOGO DE NATURALEZA DE CUENTAS CONTABLES | OFICINA CONTABLE PALOMINO</strong>
              </small>
        </div>
        <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
            <a data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">@if (count($naturaleza) == 1) {{count($naturaleza)}} registro </li>
              <li class="header text-center">@elseif (count($naturaleza) == '') {{count($naturaleza)}} ningun registro</li>
              <li class="header text-center">@elseif (count($naturaleza) != '') {{count($naturaleza)}} registros</li> @endif
            </ul>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Users</div>
        </div>

        <table class="table" id="Accounts">
          <thead>
            <tr>
              <th scope="col" class="txt-center">Código</th>
              <th scope="col" class="txt-center">Naturaleza</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="txt-center">Fecha de modificación</th>
              <th scope="col" class="txt-center">Acción</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($naturaleza as $item)
              <tr>
                <td>  {{ $item->codigo }}   </td>
                <td>  {{ $item->nombre }}</td>
                <td>  {{ $item->created_at}}  </td>
                <td>  {{ $item->updated_at}}  </td>

                <td>
                  <a href="{{ route('page-edit.naturality', ['id' => $item->id])}}" class=" tooltipsC" title="Editar naturaleza {{ $item->nombre }}">
                    <i class="fa fa-edit btn btn-outline-info btn-sm"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="txt-center">Código</th>
              <th scope="col" class="txt-center">Naturaleza</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="txt-center">Fecha de modificación</th>
              <th scope="col" class="txt-center">Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-success btn-block "></a>
    </div>
    </div>
  </div>


  <form>
    <div class="row">
      <div class="col-lg-5 col-md-3">
        <a href="{{ route('nomenclatura-de-importadora-epocas') }}" class="btn btn-info btn-block tooltipsC" title="Descargar nomenclatura de importadora épocas">
          <i class="fa fa-fw fa-view"></i> Descargar nomenclatura contable
        </a>
      </div>
    </div><br>  
  </form>

  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
        <div class="text-center">
              <small style="font-size:30px;  color:black">
                <strong>CATÁLOGO DE CUENTAS CONTABLES | SYS-JOHHAN</strong>
              </small>
        </div>
        <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
            <a data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">@if (count($accounts) == 1) {{count($accounts)}} registro </li>
              <li class="header text-center">@elseif (count($accounts) == '') {{count($accounts)}} ningun registro</li>
              <li class="header text-center">@elseif (count($accounts) != '') {{count($accounts)}} registros</li> @endif
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
              <th scope="col">Naturaleza</th>
              <th scope="col">Categoria cuenta</th>
              <th scope="col">Código</th>
              <th scope="col">Cuenta</th>
              <th scope="col" class="text-center">Fecha de creación</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center">Acción</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($accounts as $item)
              <tr>
                <td>  {{ $item->nombre }} </td>
                <td>  {{ $item->nombreCategoria }}</td>
                <td class="text-right"> {{ $item->codigoCuenta}}</td>
                <td class="text-left">  {{ $item->nombreCuenta}} </td>
                <td>  {{ $item->created_at}}  </td>

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
                      <a href="{{ route('page-edit.cuentas', ['id' => $item->id])}}" class=" tooltipsC" title="Editar registro">
                        <i class="fa fa-edit btn btn-outline-info btn-sm"></i>
                      </a>
                  @endif

                  @if($item->condicion == 1)
                    <form action="{{route('page.cuentas.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                      @csrf @method("delete")
                      <button type="submit" class="btn btn-outline-danger btn-sm  btn-accion-tabla eliminar tooltipsC" title="Desactivar registro">
                          <i class="fa fa-trash"></i>
                      </button>
                    </form>

                  @else
                    <form action="{{route('page.cuentas.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
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
              <th scope="col">Naturaleza</th>
              <th scope="col">Categoria cuenta</th>
              <th scope="col">Código</th>
              <th scope="col">Cuenta</th>
              <th scope="col" class="text-center">Fecha de creación</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center">Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-primary btn-block "></a>
    </div>
    </div>
  </div>
@endsection
