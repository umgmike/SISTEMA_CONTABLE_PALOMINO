<div class="form-group">
    <label for="fecha_inventario" class="control-label">Fecha Inventario: </label>
    <input type="date" name="fecha_inventario" id="fecha_inventario" class="form-control"
        placeholder="Ingrese Fecha Inventario" value="{{ old('fecha_inventario', $item->fecha_inventario ?? '') }}">
</div>

<div class="form-group">
    <label for="monto" class="control-label">Monto total: </label>
    <input type="number" name="monto" id="monto" class="form-control" placeholder="Ingrese Monto total"
        value="{{ old('monto', $item->monto ?? '') }}">
</div>

<div class="form-group">
    <label for="descripcion" class="control-label"><strong>Descripción : </strong></label>
    <textarea type="text" id="descripcion" rows="4" name="descripcion" class="form-control"
        placeholder="Escriba descripcion del monto total" title="Opcional"></textarea>
</div>
