<div class="form-group ">
	<label for="nombreCuenta" class="col-form-label">Editar cuenta</label>
    <input type="text" name="nombreCuenta" class="form-control" id="nombreCuenta" class="form-control" value="{{old('nombreCuenta', $registro->nombreCuenta ?? '')}}">
</div>