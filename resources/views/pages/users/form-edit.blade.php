<div class="form-group">
    <label for="id_rol" class="control-label">Editar rol</label>
    <div class="input-group input-group-sm">
        <select name="id_rol"  class="form-control select2 tooltipsC"  title="Seleccione categoría">
            @if (count($roles))
                @foreach($roles as $item)
                	<option 
	                    {{$registro->id_rol == $item->id ? 'selected': ''}}
	                    value="{{$item->id}}">{{$item->nombre_rol}} 
	                </option>
                @endforeach
            @elseif ($roles != '')
                <option value="">No se encuentró ningún registro</option>
            @endif
        </select>
    </div>
</div>

<div class="form-group ">
	<label for="nombre" class="col-form-label">Editar nombre del usuario</label>
    <input type="text" name="nombre" class="form-control" id="nombre" class="form-control" value="{{old('nombre', $registro->nombre ?? '')}} ">
</div>

<div class="form-group ">
    <label for="apellido" class="col-form-label">Editar apellido del usuario</label>
    <input type="text" name="apellido" class="form-control" id="apellido" class="form-control" value="{{old('apellido', $registro->apellido ?? '')}} ">
</div>


<div class="form-group ">
	<label for="nit" class="col-form-label">Editar NIT del usuario</label>
    <input type="text" name="nit" class="form-control" id="nit" class="form-control" value="{{old('nit', $registro->nit ?? '')}}">
</div>

<div class="form-group ">
    <label for="telefono" class="col-form-label">Editar telefono del usuario</label>
    <input type="text" name="telefono" class="form-control" id="telefono" class="form-control" value="{{old('telefono', $registro->telefono ?? '')}} ">
</div>

<div class="form-group ">
    <label for="usuario" class="col-form-label">Editar usuario</label>
    <input type="text" name="usuario" class="form-control" id="usuario" class="form-control" value="{{old('usuario', $registro->usuario ?? '')}} ">
</div>


<div class="text-center">
   <button type="button" class="btn btn-danger mt-40" id="btn_cambiar">Desea cambiar contraseña?</button>
</div><br>

