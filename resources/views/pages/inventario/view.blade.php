@extends('pages.layouts.layout')

@section('Title')
	Vista inventario
@endsection


@section('content')
  @section('nombre_ruta', 'Vista de inventario')
  @section('dashboard_nombre', 'Listado de inventario')
  @section('dashboard_ruta', route('page.inicio.inventario'))
  @include('pages.navbar.button-principal')


  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
          <div class="text-left">
            <p>
              <small style="font-size:19px;  color:black">
                <strong>Fecha de creación : </strong>  {{ $inventario->fecha_inventario }}
              </small>
            </p>

            <p>
              <small style="font-size:19px;  color:black">
                <strong>Descripción : </strong>  {{ $inventario->descripcion }}
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
              <th scope="col" class="txt-center">Fecha inventario</th>
              <th scope="col" class="txt-center">Codigo cuenta</th>
              <th scope="col" class="text-right">Nombre Cuenta</th>
              <th scope="col" class="text-right">Sub total</th>
            </tr>
          </thead>

          <tbody>
            @foreach($detalle as $item)
                <tr>
                  <td class="text-left">{{$item->fecha_inventario}}</td>
                  <td class="text-left">{{$item->codigoCuenta}}</td>
                  <td class="text-left">{{$item->nombreCuenta}}</td>
                  <td class="text-right">{{ number_format($item->sub_total,2) }}</td>

                </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>

              <th scope="col" class="txt-center"></th>
              <th scope="col" class="txt-center"></th>
              <th class="text-right">Total : </th>
              <th class="text-right">{{ number_format($totalInventario,2) }}</th>
            </tr>
          </tfoot>
        </table>

      </div>
      <a href="" class="btn btn-info btn-block "></a>
    </div>
    </div>
  </div>
@endsection