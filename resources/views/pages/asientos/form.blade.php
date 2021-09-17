<h5><p>
    <div class="form-group">
      <label for="fecha_asiento" class="control-label offset-2"><strong>Fecha :  </strong></label>
      <input type="date" name="fecha_asiento" id="fecha_asiento" class="sinborde" value="{{date('Y-m-d')}}">

      <label for="numero_partida" class="control-label offset-1"><strong>Partida N°.   </strong></label>
          <input id="numero_partida" name="numero_partida" readonly onmousedown="return false;" class="sinborde" value=
          @if (count($rel_bitacora))
              @foreach($rel_bitacora as $item)
              @endforeach
              {{ $item->partida += 1 }}
          @else
              {{ 1 }}
          @endif
          >
    </div>
  </p></h5>

<div class="form-group">
    <div class="col-lg-5 offset-2">
        <label for="id_cuenta"  id="id_cuenta" class="control-label"><strong>Seleccione cuenta: </strong></label>
        <div class="input-group input-group-sm">
            <select name="id_cuenta" id="nombreCuenta" class="form-control select2 tooltipsC"  title="Seleccione categoría">
              @if (count($daily))

                  @foreach($daily as $class)
                    @if ($class->condicion == 0)
                        <option disabled="true" value="{{$class->id}}">{{ $class->nombreCuenta }} (Cuenta desactivada)</option>
                    @elseif ($class->condicion == 1)
                        <option value="{{$class->id}}">{{ $class->nombreCuenta }}</option>
                    @endif
                  @endforeach

                @elseif ($daily != '')
                    <option value="">No se encuentró ningún registro</option>
                @endif
            </select>
                <a href="{{ route('page.create.cuentas') }}" class=" tooltipsC" title="Agregar nueva cuenta">
                    <i class="fa fa-plus btn btn-outline-secondary input-group"></i>
                </a>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 offset-2">
        <label for="debe" class="control-label"><strong>Debe : </strong></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">+ Q. </span>
            </div>
            <input type="number"  name="debe" id="debe"  class="form-control tooltipsC" title="Cifras en quetzales" placeholder="Ingrese monto debe" value="0" onkeyup="d();">
        </div>
    </div>


    <div class="col-lg-4">
        <label for="haber" class="control-label"><strong>Haber : </strong></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-info text-white">- Q. </span>
            </div>
            <input type="number"  name="haber" id="haber"  class="form-control tooltipsC" title="Cifras en quetzales" placeholder="Ingrese monto haber" value="0" onkeyup="h();">
        </div>
    </div>

</div>
