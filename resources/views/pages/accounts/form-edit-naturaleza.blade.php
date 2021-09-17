<div class="form-group ">
	<label for="nombre" class="col-form-label">Editar naturaleza de la cuenta</label>
    <input type="text" name="nombre" class="form-control" id="nombre" class="form-control" value="{{old('nombre', $registro->nombre ?? '')}}">
</div>