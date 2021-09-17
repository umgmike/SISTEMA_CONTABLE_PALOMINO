<h5><p>
  <div class="form-group">
    <label for="fecha_asiento" class="control-label offset-2"><strong>Fecha :  </strong></label>
    <input type="date" name="fecha_asiento" id="fecha_asiento" class="sinborde" value="{{old('fecha_asiento', $registro->fecha_asiento ?? '')}}">
    
    <label for="numero_partida" class="control-label offset-1"><strong>Editar partida N°.   </strong></label>
        <input id="numero_partida" name="numero_partida" readonly onmousedown="return false;" class="sinborde"
       value= "{{ $registro->numero_partida }} " >
  </div>
</p></h5>

<div class="form-group">
    <div class="col-lg-5 offset-2"> 
        <label for="id_cuenta"  id="id_cuenta" class="control-label"><strong>Seleccione cuenta: </strong></label>
        <div class="input-group input-group-sm">
            <select name="id_cuenta" id="nombreCuenta" class="form-control select2 tooltipsC"  title="Seleccione categoría">
              @if (count($accounts))

                  @foreach($accounts as $class)
                    @if ($class->condicion == 0)
                        <option disabled="true" value="{{$class->id}}">{{ $class->nombreCuenta }} (Cuenta desactivada)</option>
                    @elseif ($class->condicion == 1)
                        <option value="{{$class->id}}">{{ $class->nombreCuenta }}</option>
                    @endif
                  @endforeach

                @elseif ($accounts != '')
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




<div class="text-center" id="ocultar">
   <button type="button" class="btn btn-success mt-40" id="btn_agregar">Agregar y editar monto ( partida No. {{ old('numero_partida', $registro->numero_partida ?? '') }} )</button>
</div><br>

<div class="text-center">
    <label class="control-label"><strong>REGISTROS AGREGADOS + </strong></label>
</div><br>

<div class="text-center">
  <div  class="col-lg-12">
    <div class="table-responsive">
        <table  id="detalle_asientos_edit" class="table table-hover">
          <thead class="table-bordered">
            <tr>
                <th>Cuenta</th>
                <th class="text-right">DEBE</th>
                <th class="text-right">HABER</th>
                <th class="text-center">Opciones</th>
            </tr>
          </thead>

          <tbody id="detalle">
          </tbody>
                      
          <tfoot>
            <tr>
                <th>
                  <strong>
                    <div align="right">TOTALES : </div>
                  </strong>
                </th>

                <th>
                  <div align="right">
                    <span id="totald" class="totalDebe" style="font-size: 15px"> 0.00</span>
                  </div>
                </th>

                <th>
                  <div align="right">
                    <span id="totalh"  class="totalHaber" style="font-size: 15px">0.00</span>
                  </div>
                </th> 

              <th></th>
            </tr>
          </tfoot>
      </table>
    </div>
  </div>
</div>
