<div class="form-group">
    <label for="codigo" class="control-label">Seleccione clase : </label>
    <input type="hidden" value="1" name="codigo">
    <div class="input-group input-group-sm">
        <select  id="codigo" name="codigo"  class="form-control select2 tooltipsC"  title="Seleccione clase">
            @if (count($cat_c))
              @foreach($cat_c as $item)
              @endforeach
              @while ($item->codigo < 9)
                {{ $item->codigo += 1 }}
                @php
                  echo "<option value='";
                  echo $item->codigo;
                  echo "'";
                  echo ">" . $item->codigo." </option>";
                @endphp
              @endwhile
            @endif
        </select>
    </div>
</div>

<div class="form-group">
  <label for="nombre" class="control-label">Clasificación: </label>
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese clasificación Ejemplo: Activo" value="{{old('nombre')}}" required>
</div>