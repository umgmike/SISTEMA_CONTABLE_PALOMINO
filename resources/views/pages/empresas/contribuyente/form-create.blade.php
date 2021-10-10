<div class="form-group">
  <label for="nit" class="control-label">NIT: </label>
    <input type="text" name="nit" id="nit" class="form-control col-md-11" placeholder="Ingrese Nit" value="{{old('nit')}}">
</div>

<div class="form-group">
  <label for="nombre" class="control-label">Nombre: </label>
    <input type="text" name="nombre" id="nombre" class="form-control col-md-11" placeholder="Ingrese nombre" value="{{old('nombre')}}">
</div>

<div class="form-group">
  <label for="apellido" class="control-label">Apellido: </label>
    <input type="text" name="apellido" id="apellido" class="form-control col-md-11" placeholder="Ingrese apellido" value="{{old('apellido')}}">
</div>

<div class="form-group">
  <label for="telefono" class="control-label">Teléfono: </label>
    <input type="text" name="telefono" id="telefono" class="form-control col-md-11" placeholder="Ingrese telefono" value="{{old('telefono')}}">
</div>

<div class="form-group">
  	<label for="id_genero" class="control-label">Seleccione género</label>
   	<div class="input-group input-group-sm ">
       	<select name="id_genero"  class="form-control select2 tooltipsC col-md-10"  title="Seleccione género">
        	@if (count($gender))
        		@foreach($gender as $item)
        				<option value="{{$item->id}}">{{$item->tipo_genero}}</option>
        		@endforeach
       	    @elseif ($gender != '')
       	        <option value="">No se encuentró ningún registro</option>
       	    @endif
       	</select>
       	<a style="margin-left: 5px;" href="" class=" tooltipsC" title="Agregar nuevo género">
            <i class="fa fa-users btn btn-outline-secondary input-group"></i>
        </a>
    </div>
</div>

<div class="form-group">
  <label for="fecha_nacimiento" class="control-label">Fecha de nacimiento: </label>
    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control col-md-11" placeholder="Ingrese fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
</div>
