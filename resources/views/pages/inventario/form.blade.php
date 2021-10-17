
<div class="form-group">
    <div class="col-lg-5 offset-2">
        <label for="id_cuenta"  id="id_cuenta" class="control-label"><strong>Seleccione cuenta: </strong></label>
        <div class="input-group input-group-sm">
            <select name="id_cuenta" id="nombreCuenta" class="form-control select2 tooltipsC col-md-10"  title="Seleccione categoría">
              @if (count($cuenta))

                  @foreach($cuenta as $class)
                    @if ($class->condicion == 0)
                        <option disabled="true" value="{{$class->id}}">{{ $class->nombreCuenta }} (Cuenta desactivada)</option>
                    @elseif ($class->condicion == 1)
                        <option value="{{$class->id}}">{{ $class->nombreCuenta }}</option>
                    @endif
                  @endforeach

                @elseif ($cuenta != '')
                    <option value="">No se encuentró ningún registro</option>
                @endif
            </select>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-4 offset-2">
        <label for="sub_total" class="control-label"><strong>Monto inventario : </strong></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">Q. </span>
            </div>
            <input type="number"  name="sub_total" id="sub_total"  class="form-control tooltipsC" title="Cifras en quetzales" placeholder="Ingrese monto" value="0" onkeyup="monto_i();">
        </div>
    </div>

</div>
