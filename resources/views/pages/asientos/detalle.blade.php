
  <div class="text-center" id="ocultar">
   <button type="button" class="btn btn-secondary mt-40" id="btn_agregar">Agregar registro</button>
  </div><br>


<div class="text-center">
    <label class="control-label"><strong>REGISTROS AGREGADOS + </strong></label>
</div><br>

<div class="text-center">
  <div  class="col-lg-12">
    <div class="table-responsive">
        <table  id="detalle_asiento" class="table table-hover">
          <thead class="table-bordered">
            <tr>
                <th>Cuenta</th>
                <th class="text-right">DEBE</th>
                <th class="text-right">HABER</th>
                <th class="text-center">Opciones</th>
            </tr>
          </thead>

          <tbody id="cuerpo">
          </tbody>
                      
          <tfoot>
            <tr>
                <th>
                  <strong>
                    <div align="right">TOTALES : </div>
                  </strong>
                </th>

                <th>
                  <div align="right">
                    <span id="totald" class="totalDebe" style="font-size: 15px"> 0.00</span>
                  </div>
                </th>

                <th>
                  <div align="right">
                    <span id="totalh"  class="totalHaber" style="font-size: 15px">0.00</span>
                  </div>
                </th> 

              <th></th>
            </tr>
          </tfoot>
      </table>
    </div>
  </div>
</div>