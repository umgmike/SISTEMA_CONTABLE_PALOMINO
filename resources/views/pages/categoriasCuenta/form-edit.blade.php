<div class="form-group ">
	<label for="nombreCategoria" class="col-form-label">Editar categoría de la cuenta</label>
    <input type="text" name="nombreCategoria" class="form-control" id="nombreCategoria" class="form-control" value="{{old('nombreCategoria', $registro->nombreCategoria ?? '')}}">
</div>