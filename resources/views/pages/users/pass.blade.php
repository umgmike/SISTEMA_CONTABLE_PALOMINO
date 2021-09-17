
    <div class="form-group">
        <label for="password" class="col-form-label {{!isset($registro) ? 'required' : ''}}">Nueva Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese nueva password" value="" {{!isset($registro) ? 'required' : ''}} minlength="8">
    </div>


    <div class="form-group">
        <label for="re_password" class="col-form-label {{!isset($registro) ? 'required' : ''}}">Confirme contraseña</label>
        <input type="password" name="re_password" id="re_password" class="form-control" placeholder="Repita contraseña" value="" {{!isset($registro) ? 'required' : ''}} minlength="8">
    </div>