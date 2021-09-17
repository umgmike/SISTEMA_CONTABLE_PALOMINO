<div class="form-group ">
    <label for="fecha_inventario" class="col-form-label">Editar fecha inventario final</label>
    <input type="date" name="fecha_inventario" class="form-control" id="fecha_inventario" class="form-control"
        value="{{ old('fecha_inventario', $registro->fecha_inventario ?? '') }}">
</div>

<div class="form-group ">
    <label for="monto" class="col-form-label">Editar monto inventario final</label>
    <input type="number" name="monto" class="form-control" id="monto" class="form-control"
        value="{{ old('monto', $registro->monto ?? '') }}">
</div>

<div class="form-group ">
    <label for="monto" class="col-form-label">Editar descripcion inventario final</label>
    <textarea type="text" name="descripcion" id="descripcion" class="form-control"
        rows="3">{{ old('descripcion', $registro->descripcion ?? '') }}</textarea>
</div>
