@extends('pages.layouts.layout')

@section('Title')
	Vista de asiento No. {{ $asiento->numero_partida }}
@endsection


@section('content')
  @section('nombre_ruta', 'Vista de  asientos contables')
  @section('dashboard_nombre', 'Listado de asientos contables')
  @section('dashboard_ruta', route('page.inicio'))
  @include('pages.navbar.button-principal')


  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
          <div class="text-left">
            <p>
              <small style="font-size:19px;  color:black">
                <strong>Partida No.</strong> {{ $asiento->numero_partida }}
              </small>
            </p>

            <p>
              <small style="font-size:19px;  color:black">
                <strong>Fecha partida : </strong>  {{ $asiento->fecha_asiento }}
              </small>
            </p>

            <p>
              <small style="font-size:19px;  color:black">
                <strong>Fecha de creación : </strong>  {{ $asiento->created_at }}
              </small>
            </p>

            <p>
              <small style="font-size:19px;  color:black">
                <strong>Descripción : </strong>  {{ $asiento->descripcion }}
              </small>
            </p>

          </div>
      </div>


      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">daily</div>
        </div>

          <table class="table table-bordered" id="Detalle_vista">
          <thead>
            <tr>
              <th scope="col" class="txt-center">#</th>
              <th scope="col" class="txt-center">Código cuenta</th>
              <th scope="col" class="txt-center">Nombre de cuenta</th>
              <th scope="col" class="text-right">Q. Debe </th>
              <th scope="col" class="text-right">Q. Haber</th>
            </tr>
          </thead>

          <tbody>
            @foreach($detalle as $item)
                <tr>
                  <td class="text-left">{{$item->numero_partida}}</td>
                  <td class="text-left">{{$item->codigoCuenta}}</td>
                  <td class="text-left">{{$item->nombreCuenta}}</td>
                  <td class="text-right">{{ number_format($item->debe,2) }}</td>
                  <td class="text-right">{{ number_format($item->haber,2) }}</td>
                </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="txt-center"></th>
              <th scope="col" class="txt-center"></th>
              <th class="text-right">Totales : </th>
              <th class="text-right">{{ number_format($totalDebe,2) }}</th>
              <th class="text-right">{{ number_format($totalHaber,2) }}</th>
            </tr>
          </tfoot>
        </table>

      </div>
      <a href="" class="btn btn-info btn-block "></a>
    </div>
    </div>
  </div>
@endsection