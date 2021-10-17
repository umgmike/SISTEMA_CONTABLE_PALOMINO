@extends('pages.layouts.layout')

@section('Title')
  Control de inventarios
@endsection

@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('content')
  @section('nombre_ruta', 'Catálogo de inventarios')
  @section('dashboard_nombre', 'Listado general')
  @section('dashboard_ruta', route('pages.list-general'))
  @include('pages.navbar.button-secondary')

  <form>
    <div class="row">
	    <div class="col-lg-3 col-md-3">
	        <a href=" {{ route('page.inventory-create') }}" class="btn btn-info btn-block tooltipsC" title="Crear nuevo registro">
	          <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo registro
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
                <strong>CONTROL DE INVENTARIOS | OFICINA CONTABLE PALOMINO</strong>
              </small>
        </div>

          <div class="dropdown notifications-menu text-center"><b>Cantidad de registros activos :</b>
              <a data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header text-center">registro activo</li>
                <li class="header text-center">ningun registro activo</li>
                <li class="header text-center">registros activos</li> 
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
              <th >Responsable</th>
              <th >Fecha Inventario</th>
              <th >Monto</th>
              <th >Descripcion</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Acciones</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($inventarios as $item)
              @if ($item->condicion == 1)
              <tr>
                <td > {{ $item->usuario }}   </td>
                <td >  {{ $item->fecha_inventario }} </td>
                <td class="text-right" >{{ number_format($item->monto_total,2) }}   </td>
                <td > {{ $item->descripcion }}  </td>
                <td class="text-center">
                    @if($item->condicion == 1)
                      <button type="submit" class="btn btn-outline-info btn-sm tooltipsC" title="Registrada">
                        <i class="fa fa-check-circle-o"> Registrado </i>
                      </button>
                    @elseif($item->condicion == 0)
                      <button type="submit" class="btn btn-outline-danger btn-sm  tooltipsC" title="Anulado">
                        <i class="fa fa-times-circle-o"> Anulado</i>
                      </button>
                    @endif
                </td>

                <td class="text-center">

                  @if($item->condicion == 1)
                        <a href="{{route('page-inventory.daily', ['id' => $item->id])}}" class=" tooltipsC" title="Ver detalle">
                          <i class="fa fa-eye btn btn-outline-secondary btn-sm"></i>
                        </a>
                    @endif

                  @if($item->condicion == 1)
                      <form action="{{route('page.inventory.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                        @csrf @method("delete")
                        <button type="submit" class="btn btn-outline-danger btn-sm  btn-accion-tabla eliminar tooltipsC" title="Anular">
                            <i class="fa fa-trash"></i>
                        </button>
                      </form>

                    @else
                      <form action="{{route('page.inventory.delete', ['id' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                        @csrf @method("delete")
                        <button type="submit" class="btn btn-outline-success btn-sm  btn-accion-tabla eliminar tooltipsC" title="Activar">
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
              <th >Responsable</th>
              <th >Fecha Inventario</th>
              <th >Monto</th>
              <th >Descripcion</th>
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