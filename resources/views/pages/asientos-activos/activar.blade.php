@extends('pages.layouts.layout')

@section('Title')
  Activar cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')

  <form>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <a href="{{ route('page.inicio') }}" class="btn btn-info btn-block tooltipsC" title="{{count($dato['AsientoActives'])}}">
              <i class="fa fa-view"></i> Asientos activados
            </a>
        </div>
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
                <strong>LIBRO DIARIO | OFICINA CONTABLE PALOMINO</strong>
              </small>
        </div>

          <div class="dropdown notifications-menu text-center"><b>Cantidad de registros inactivos :</b>
              <a data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header text-center">@if (count($dato['AsientoInactiveAlls']) == 1) {{count($dato['AsientoInactiveAlls'])}} registro inactivo </li>
                <li class="header text-center">@elseif (count($dato['AsientoInactiveAlls']) == '') {{count($dato['AsientoInactiveAlls'])}} ningun registro inactivo</li>
                <li class="header text-center">@elseif (count($dato['AsientoInactiveAlls']) != '') {{count($dato['AsientoInactiveAlls'])}} registros inactivos</li> @endif
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
              <th scope="col" class="txt-center">Fecha partida</th>
              <th scope="col" class="txt-center">No. partida</th>
              <th scope="col" class="txt-center">Debe Q.</th>
              <th scope="col" class="txt-center">Haber Q.</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center">Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($asientos_a as $asiento)
              @if ($asiento->condicion == 0)
              <tr>
                <td>  {{ $asiento->fecha_asiento }}   </td>
                <td>  {{ $asiento->numero_partida }}   </td>
                <td>Q  {{ number_format($asiento->total_debe),2 }}   </td>
                <td>Q  {{ number_format($asiento->total_haber),2 }}   </td>
                <td>  {{ $asiento->created_at }}   </td>
                <td>
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
              <th scope="col" class="txt-center">Fecha partida</th>
              <th scope="col" class="txt-center">No. partida</th>
              <th scope="col" class="txt-center">Debe Q.</th>
              <th scope="col" class="txt-center">Haber Q.</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="text-center">Estado</th>
              <th scope="col" class="text-center">Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-info btn-block "></a>
    </div>
    </div>
  </div>
@endsection
