@extends('pages.layouts.layout')

@section('Title')
  Libro diario
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  @section('nombre_ruta', 'Catálogo de asientos contables')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-secondary')

  <form>
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <a href="{{ route('page.asiento-create') }}" class="btn btn-info btn-block tooltipsC" title="Crear nuevo asiento contable">
          <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo asiento contable
        </a>
      </div>
        
      <div class="col-lg-3 col-md-3">
        <a href="{{ route('pdf_asientoLD') }}" class="btn btn-primary btn-block tooltipsC" title="Guardar reporte 'Libro diario'">
          <i class="fa fa-save"></i> Guardar reporte "Libro diario"
        </a>
      </div>

      <div class="col-lg-3 col-md-3">
        <a href="{{ route('pdf_asientoLD_download') }}" class="btn btn-secondary btn-block tooltipsC" title="Descargar reporte 'Libro diario'">
          <i class="fa fa-download"></i> Descarga directa
        </a>
      </div>

      @foreach ($asientos_c as $asiento)
      @endforeach
        @if (count($datos['AsientoInactiveAll']))
          <div class="col-lg-3 col-md-3">
            <a href="{{ route('page.asientos-desactivados') }}" class="btn btn-danger btn-block tooltipsC" title="{{count($datos['AsientoInactiveAll'])}}">
              <i class="fa fa-trash"></i> Asientos desactivados
            </a>
          </div>
        @endif

    </div><br>  
  </form>

  @include('includes.form-error')
  @include('includes.mensaje')

  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
        <div class="text-center">
              <small style="font-size:30px;  color:black">
                <strong>LIBRO DIARIO | SYS-JOHHAN</strong>
              </small>
        </div>

          <div class="dropdown notifications-menu text-center"><b>Cantidad de registros activos :</b>
              <a data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header text-center">@if (count($datos['AsientoActive']) == 1) {{count($datos['AsientoActive'])}} registro activo</li>
                <li class="header text-center">@elseif (count($datos['AsientoActive']) == '') {{count($datos['AsientoActive'])}} ningun registro activo</li>
                <li class="header text-center">@elseif (count($datos['AsientoActive']) != '') {{count($datos['AsientoActive'])}} registros activos</li> @endif
              </ul>
          </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">daily</div>
        </div>

        <table class="table" id="TableStyle">
          <thead>
            <tr>
              <th class="text-center">Fecha partida</th>
              <th class="text-center">No. partida</th>
              <th class="text-right">Debe Q</th>
              <th class="text-right">Haber Q</th>
              <th class="text-center">Fecha de creación</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($asientos_c as $asiento)
              @if ($asiento->condicion == 1)
              <tr>
                <td class="text-center">  {{ $asiento->someDate }}   </td>
                <td class="text-center">  {{ $asiento->numero_partida }}   </td>
                <td class="text-right">Q. {{ number_format($asiento->total_debe,2) }}   </td>
                <td class="text-right">Q. {{ number_format($asiento->total_haber,2) }}   </td>
                 <td class="text-center">  {{ $asiento->someDate2 }}   </td>
                <td class="text-center">
                    @if($asiento->condicion == 1)
                      <button type="submit" class="btn btn-outline-info btn-sm tooltipsC" title="Partida {{ $asiento->numero_partida }} registrada">
                        <i class="fa fa-check-circle-o"> Registrado </i>
                      </button>
                    @elseif($asiento->condicion == 0)
                      <button type="submit" class="btn btn-outline-danger btn-sm  tooltipsC" title="Partida {{ $asiento->numero_partida }} anulada">
                        <i class="fa fa-times-circle-o"> Anulado</i>
                      </button>
                    @endif
                </td>

                <td class="text-center">
                    @if($asiento->condicion == 1)
                        <a href="{{route('page-show.daily', ['id' => $asiento->id])}}" class=" tooltipsC" title="Ver detalle partida No. {{ $asiento->numero_partida }}">
                          <i class="fa fa-eye btn btn-outline-secondary btn-sm"></i>
                        </a>

                        <a href="{{route('pdf_asientoLD_download')}}" class=" tooltipsC" title="Descargar reporte general">
                          <i class="fa fa-download btn btn-outline-primary btn-sm"></i>
                        </a>

                        <a href="{{ route('page.daily-edit', ['id' => $asiento->id]) }}" class=" tooltipsC" title="Editar partida No. {{ $asiento->numero_partida }}">
                          <i class="fa fa-pencil btn btn-outline-info btn-sm"></i>
                        </a>
                    @endif


                    @if($asiento->condicion == 1)
                      <form action="{{route('page.daily.delete', ['id' => $asiento->id])}}" class="d-inline form-eliminar" method="POST">
                        @csrf @method("delete")
                        <button type="submit" class="btn btn-outline-danger btn-sm  btn-accion-tabla eliminar tooltipsC" title="Anular partida No. {{ $asiento->numero_partida }}">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>

                    @else
                      <form action="{{route('page.daily.delete', ['id' => $asiento->id])}}" class="d-inline form-eliminar" method="POST">
                        @csrf @method("delete")
                        <button type="submit" class="btn btn-outline-success btn-sm  btn-accion-tabla eliminar tooltipsC" title="Activar partida No. {{ $asiento->numero_partida }}">
                          <i class="fa fa-recycle"></i>
                         </button>
                       </form>
                    @endif
                  </td>

              </tr>
              @endif
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th class="text-center">Fecha partida</th>
              <th class="text-center">No. partida</th>
              <th class="text-right">Debe Q</th>
              <th class="text-right">Haber Q</th>
              <th class="text-center">Fecha de creación</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-success btn-block "></a>
    </div>
    </div>
  </div>
@endsection