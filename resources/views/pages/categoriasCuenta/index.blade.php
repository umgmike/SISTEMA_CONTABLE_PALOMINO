@extends('pages.layouts.layout')

@section('Title')
  Categoría de cuentas
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  @section('nombre_ruta', 'Categoría de cuentas')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-principal')

  <form>
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <a href="{{ route('cat.create') }}" class="btn btn-danger btn-block tooltipsC" title="Crear nueva categoria de cuenta">
          <i class="fa fa-fw fa-plus-circle"></i> Crear nueva categoria de cuenta
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
                <strong>CATEGORIA DE CUENTAS CONTABLES | OFICINA CONTABLE PALOMINO</strong>
              </small>
        </div>
        <div class="dropdown notifications-menu text-center"><b>Cantidad de registros :</b>
            <a data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="header text-center">@if (count($catCuenta) == 1) {{count($catCuenta)}} registro </li>
              <li class="header text-center">@elseif (count($catCuenta) == '') {{count($catCuenta)}} ningun registro</li>
              <li class="header text-center">@elseif (count($catCuenta) != '') {{count($catCuenta)}} registros</li> @endif
            </ul>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">Categori account</div>
        </div>

        <table class="table" id="TableStyle">
          <thead>
            <tr>
              <th scope="col" class="txt-center">#</th>
              <th scope="col" class="txt-center">Nombre de categoria de cuenta</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="txt-center">Fecha de modificación</th>
              <th scope="col" class="text-center">Acción</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($catCuenta as $item)
              <tr>
                <td>  {{ $item->id }}   </td>
                <td>  {{ $item->nombreCategoria }}   </td>
                <td>  {{ $item->created_at }}   </td>
                <td>  {{ $item->updated_at }}   </td>

                <td class="text-center">
                    <a href="{{ route('cat-edit', ['id' => $item->id])}}" class=" tooltipsC" title="Editar categoria de cuenta {{ $item->nombreCategoria }} ">
                        <i class="fa fa-edit btn btn-outline-primary btn-sm"></i>
                    </a>
                 </td>

              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th scope="col" class="txt-center">#</th>
              <th scope="col" class="txt-center">Nombre de categoria de cuenta</th>
              <th scope="col" class="txt-center">Fecha de creación</th>
              <th scope="col" class="txt-center">Fecha de modificación</th>
              <th scope="col" class="text-center">Acción</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <a href="" class="btn btn-danger btn-block "></a>
    </div>
    </div>
  </div>
@endsection
