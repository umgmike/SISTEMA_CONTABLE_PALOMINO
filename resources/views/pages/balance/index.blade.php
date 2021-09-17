@extends('pages.layouts.layout')

@section('Title')
  Balance de situación
@endsection

@section('content')
  @section('nombre_ruta', 'Vista de balance situación')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-principal')

	<div class="portfolio-menu text-center mb-30">
    	<div class="col-lg-4">
      		<a href="{{ route('B-g') }}" class="btn btn-danger btn-block tooltipsC" title="Descargar ''reporte Balance de situación'' ">
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
              <strong>BALANCE GENERAL | SYS-JOHHAN</strong>
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
            <div class="ribbon bg-gray-light">balance sheet</div>
        </div>

        <table class="table table-bordered" id="Detalle_vista">
          <thead>
            <tr>
              <th scope="col" class="txt-center">#</th>
              <th scope="col" class="txt-center">Cuenta</th>
              <th scope="col" class="text-right">Debe</th>
              <th scope="col" class="text-right">Haber</th>
              <th scope="col" class="text-right">Deudor</th>
              <th scope="col" class="text-right">Acreedor</th>
            </tr>
          </thead>

          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="text-right"></th>
              <th scope="col" class="text-right">Totales : </th>
              <th scope="col" class="text-right"></th>
              <th scope="col" class="text-right"></th>
              <th scope="col" class="text-right"></th>
              <th scope="col" class="text-right"></th>
            </tr>
          </tfoot>
        </table>

      </div>
      <a href="" class="btn btn-secondary btn-block "></a>
    </div>
    </div>
  </div>
@endsection