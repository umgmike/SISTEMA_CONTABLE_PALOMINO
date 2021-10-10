<div class="form-group">
  	<label for="id_contribuyente" class="control-label">Seleccione contribuyente</label>
   	<div class="input-group input-group-sm">
       	<select name="id_contribuyente"  class="form-control select2 tooltipsC col-md-10"  title="Seleccione contribuyente">
        	@if (count($contribuyente))
        		@foreach($contribuyente as $item)
        				<option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido}}</option>
        		@endforeach
       	    @elseif ($contribuyente != '')
       	        <option value="">No se encuentró ningún registro</option>
       	    @endif
       	</select>
       	<a href="{{ route('page.contribuyente.create') }}" style="margin-left: 5px;" class=" tooltipsC" title="Agregar nuevo contribuyente">
            <i class="fa fa-user btn btn-outline-secondary input-group"></i>
        </a>
    </div>
</div>

<div class="form-group">
    <label for="id_regimen" class="control-label">Seleccione régimen</label>
    <div class="input-group input-group-sm ">
        <select name="id_regimen"  class="form-control select2 tooltipsC col-md-11"  title="Seleccione régimen">
          @if (count($regimen))
            @foreach($regimen as $item)
                <option value="{{$item->id}}">{{$item->nombre_regimen}}</option>
            @endforeach
            @elseif ($regimen != '')
                <option value="">No se encuentró ningún registro</option>
            @endif
        </select>
    </div>
</div>


<div class="form-group">
  <label for="nit" class="control-label">NIT: </label>
    <input type="text" name="nit" id="nit" class="form-control col-md-11" placeholder="Ingrese Nit" value="{{old('nit')}}">
</div>

<div class="form-group" >
    <label for="anyo_contable" class="control-label">Año contable: </label>
    <input type="text" name="anyo_contable" id="anyo_contable" class="form-control col-md-11" value="{{old('anyo_contable', date('Y'))}}">
</div>

<div class="form-group" >
    <label for="nombre_establecimiento" class="control-label">Nombre establecimiento: </label>
    <input type="text" name="nombre_establecimiento" id="nombre_establecimiento" class="form-control col-md-11" placeholder="Ingrese Nombre establecimiento" value="{{old('nombre_establecimiento' )}}">
</div>

<div class="form-group" >
    <label for="descripcion" class="control-label">Descripcion: </label>
	<textarea type="text" id="descripcion" rows="6" name="descripcion" class="form-control col-md-11" placeholder="Escriba descripción" title="Escriba descripción"></textarea required>
</div>
