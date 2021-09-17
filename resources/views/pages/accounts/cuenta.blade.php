<div class="form-group">
    <label for="id_categoria" class="control-label">Seleccione naturaleza : </label>
    <div class="input-group input-group-sm">
    <select id="id_categoria" name="id_categoria"  class="form-control select2 tooltipsC"  title="Seleccione categoría">
      @if (count($a_class))
          @foreach($a_class as $class)
              <option value="{{$class->id}}">{{ $class->codigo }}. <p> </p> {{ $class->nombre}}</option>
          @endforeach
        @elseif ($a_class != '')
            <option value="">No se encuentró ningún registro</option>
        @endif
    </select>
    </div>
</div>

<div class="form-group">
    <label for="id_categoria_cuenta" class="control-label">Seleccione categoría cuenta : </label>
    <div class="input-group input-group-sm">
    <select id="id_categoria_cuenta" name="id_categoria_cuenta"  class="form-control select2 tooltipsC"  title="Seleccione categoría cuenta">
      @if (count($accounts_cat))
          @foreach($accounts_cat as $item)
              <option value="{{$item->id}}">{{ $item->nombreCategoria }}</option>
          @endforeach
        @elseif ($accounts_cat != '')
            <option value="">No se encuentró ningún registro</option>
        @endif
    </select>
    <a href="{{ route('cat.create') }}" class=" tooltipsC" title="Agregar nueva categoría cuenta">
      <i class="fa fa-plus btn btn-outline-info input-group"></i>
    </a>
    </div>
</div>

<div class="form-group">
    <label for="id_cors" class="control-label">Seleccione cors : </label>
    <div class="input-group input-group-sm">
    <select id="id_cors" name="id_cors"  class="form-control select2 tooltipsC"  title="Seleccione categoría" onchange="ShowSelected();">
      <option  value="">Seleccione</option>
      @if (count($cors))
          @foreach($cors as $item1)
              <option value="{{$item1->id}}">{{ $item1->cors_nombre}}</option>
          @endforeach
        @elseif ($cors != '')
            <option value="">No se encuentró ningún registro</option>
        @endif
    </select>
    </div>
</div>

  <div id="Activos" class="form-group">
    <label for="codigoCuenta" class="control-label">Código : </label>
      <input id="codigoCuenta" name="codigoCuenta" class="form-control" readonly onmousedown="return false;"
      value="0">
  </div>


<div class="form-group">
  <label for="nombreCuenta" class="control-label">Nombre de la cuenta: </label>
    <input type="text" name="nombreCuenta" id="nombreCuenta" class="form-control" placeholder="Ingrese nombre de la cuenta" value="{{old('nombreCuenta')}}" required>
</div>

