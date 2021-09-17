@extends('pages.layouts.layout')

@section('Title')
  Libro mayor
@endsection

@section('content')
  @section('nombre_ruta', 'Vista de libro mayor contable')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-secondary')

	<div class="portfolio-menu text-center mb-30">
    	<div class="col-lg-4">
      		<a href="{{ route('libro.Mayor-PDF') }}" class="btn btn-primary btn-block tooltipsC" title="Descargar ''reporte Libro Mayor'' ">
        		<i class="fa fa-fw fa-plus-circle"></i> Descargar reporte
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
          <p>
            <small style="font-size:25px;  color:black">
              <strong>LIBRO MAYOR | SYS-JOHHAN</strong>
            </small><br>

            <small style="font-size:15px;  color:black">
              <strong>(Cifras en quetzales)</strong><br>
              <small style="font-size:15px;  color:black">
              <strong>Hora y fecha : {{ date('Y-m-d H:m:s') }}</strong>
            </small>
            </small>
          </p>
              
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Ledger</div>
        </div>

        <table class="table table-bordered" id="Detalle_vista">
          <thead>
            <tr>
              <th scope="col" class="txt-center">N° de partida</th>
              <th scope="col" class="txt-center">Cuenta</th>
              <th scope="col" class="text-right">Debe</th>
              <th scope="col" class="text-right">Haber</th>
              <th scope="col" class="text-right">Deudor</th>
              <th scope="col" class="text-right">Acreedor</th>
            </tr>
          </thead>

          <tbody>
            @foreach($Deudor as $item)
              <tr>
                <td>{{$item->numero_partida}}</td>
                <td>{{$item->nombreCuenta}}</td>
                <td class="text-right">{{ number_format($item->debe,2 ) }}</td>
                <td class="text-right">{{ number_format($item->haber,2 ) }}</td>
                <td class="text-right">{{ number_format($item->sumaDebe,2 ) }}</td>
                <td class="text-right">{{ number_format($item->sumaHaber,2 ) }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="text-right"></th>
              <th scope="col" class="text-right">Totales : </th>
              <th scope="col" class="text-right">{{ number_format($totalDebe,2) }}</th>
              <th scope="col" class="text-right">{{ number_format($totalHaber,2) }}</th>
              <th scope="col" class="text-right">{{ number_format($totalDeudor,2) }}</th>
              <th scope="col" class="text-right">{{ number_format($totalAcreedor,2) }}</th>
            </tr>
          </tfoot>
        </table>

      </div>
      <a href="" class="btn btn-primary btn-block "></a>
    </div>
    </div>
  </div>
@endsection
