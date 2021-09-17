@extends('pages.layouts.layout')

@section('Title')
  Crear Libro diario
@endsection

<style>
    .sinborde {
        border: 0;
    }    
</style>

@section('content')
  @section('nombre_ruta', 'Catálogo de asientos contables')
  @section('dashboard_nombre', 'Catálogo de asientos contables')
  @section('dashboard_ruta', route('page.inicio'))
  @include('pages.navbar.button-secondary')

  <div class="col-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="single-portfolio-slide">
     <div class="card"> 
      <div class="card-header">
        <div class="text-center">
              <small style="font-size:30px;  color:black">
                <strong>LIBRO DIARIO | OFICINA CONTABLE PALOMINO</strong>
              </small>
        </div>
      </div>

      <div class="card-body">
        <div class="ribbon-wrapper ribbon-lg">
            <div class="ribbon bg-gray-light">daily</div>
        </div>

        <form class="form-horizontal" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

          @include("pages.asientos.form")

          @include("pages.asientos.detalle")

          <br><br>
          <div class="row offset-2">
            <div class="col-lg-10">
              <label for="descripcion" class="control-label"><strong>Descripción : </strong></label>
              <textarea type="text" id="descripcion" rows="6" name="descripcion" class="form-control" placeholder="Escriba descripcion del asiento contable" title="Escriba descripcion del asiento contable"></textarea required>
            </div>
          </div> 


          <div class="text-center">
            <button type="button" class="btn btn-primary mt-40 btn-bg" id="registro" onclick="validar()">Guardar informacion</button>
          </div>
        </form>

      </div>
      <a href="" class="btn btn-primary btn-block "></a>
    </div>
    </div>
  </div>
@endsection

@section('footer_scripts')

  <script type="text/javascript">

    $("#ocultar").hide();

    function d() {
      let d = document.getElementById("debe").value;
 
      if ( d === "0" || d === '') {
        $("#ocultar").hide();
      }else {
        $("#ocultar").show();
      }
      
    }

    function h() {
      let h = document.getElementById("haber").value;

      if ( h === "0" || h === '') {
        $("#ocultar").hide();
      }else {
        $("#ocultar").show();
      }
      
    }

    document.getElementById("debe").value = "0";

    var i = 1;

    document.addEventListener('contextmenu', function(evt) {
      evt.preventDefault();
      return false;
    });

    $("#registro").click(function() {

      var t_d = $("#totald").text();
      var t_h = $("#totalh").text();

      if (t_d == t_h) {

        var numero_partida = $("#numero_partida").val();
        var fecha_asiento = $("#fecha_asiento").val();
        var descripcion = $("#descripcion").val();
        var total_debe = $("#totald").text();
        var total_haber = $("#totalh").text();
        var myTableArray = [];

        var URL = "{{ route('asiento.store') }}";
        var token = $("input[name='_token']").val();

        $("table#detalle_asiento tr").each(function() {
          var arrayOfThisRow = [];
          var tableData = $(this).find('td');
          if (tableData.length > 0) {
            tableData.each(function() {
              arrayOfThisRow.push($(this).text());
            });
            myTableArray.push(arrayOfThisRow);
          }
        });

        $.ajax({
          type: "POST",
          url: URL,
          dataType: 'json',
          headers: {
            'X-CSRF-TOKEN': token
          },

          data: {
            fecha_asiento: fecha_asiento,
            numero_partida: numero_partida,
            total_debe: total_debe,
            total_haber: total_haber,
            descripcion: descripcion,
            tab: myTableArray,
          },

          success: function(data) {
            location.reload();
          },
          error: function(msj) {}
        });
      } else if (t_d == 0 && t_h == 0) {
        alert('La partida está inicializada en 0, Por favor registre datos para ser almacenados con éxito')
      } else {
        alert('La partida no esta cuadrada, Por favor cuádrela');
      }
    });


    $('#btn_agregar').click(function() {
      $("#ocultar").hide();
      
      var fecha = document.getElementById("fecha_asiento").value;
      var partida = document.getElementById("numero_partida").value;
      var id_cuenta = document.getElementById("id_cuenta").value;
      var combo = document.getElementById("nombreCuenta");
      var selected = combo.options[combo.selectedIndex].text;

      var debe = document.getElementById('debe').value;
      var haber = document.getElementById('haber').value;
      var descripcion = document.getElementById('descripcion').value;


      var monto = parseFloat(debe);
      var monto2 = parseFloat(haber);

      if (debe.trim() != '') {
        var fila = '<tr class="fila" id="row' + i + '">' +

          '<td name="ctv" id="cuenta">' + selected + '</td>' +
          '<td class="monto text-right" id="monto" >' + monto.toFixed(2) + '</td>' +
          '<td class="monto2 text-right" id="monto2" >' + monto2.toFixed(2) + '</td>' +
          '<td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove"><i class="fa fa-trash tooltipsC" title="Remover registro"></button>' +
          '<td class="id" id="id_cuenta" style="visibility:hidden;" >' + combo['value'] + '</td>' + '</td></tr>';
        i++;
        $('#cuerpo').append(fila);

      } else {
        alert('Por favor rellene la informacion para guardar su informacion');
      }

      document.getElementById("debe").value = "0";
      document.getElementById("haber").value = "0";

    });


    //nombreCuenta
    $('#btn_agregar').click(function() {
      var total = 0;
      $('.monto').each(function() {
        total += parseFloat($(this).html());
      })
      $('.totalDebe').html(total.toFixed(2));
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();

    });

    $(document).on('click', '.btn_remove', function() {
      var totalrenew = $('.totalDebe').html();
      var monto = $('.monto').html();
      var newtotal = parseFloat(totalrenew) - parseFloat(monto);

      var total = 0;
      $('.monto').each(function() {
        total += parseFloat($(this).html());
      });
      $('.totalDebe').html(total.toFixed(2));

      console.log('totalrenew:' + totalrenew.toFixed(2));
      console.log('monto:' + monto.toFixed(2));
      console.log('newtotal:' + newtotal.toFixed(2));
    });



    $('#btn_agregar').click(function() {
      var total2 = 0;
      $('.monto2').each(function() {
        total2 += parseFloat($(this).html());
      })
      $('.totalHaber').html(total2.toFixed(2));
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();

    });

    $(document).on('click', '.btn_remove', function() {
      var totalrenew2 = $('.totalHaber').html();
      var monto2 = $('.monto2').html();
      var newtotal2 = parseFloat(totalrenew2) - parseFloat(monto2);

      var total2 = 0;
      $('.monto2').each(function() {
        total2 += parseFloat($(this).html());
      });
      $('.totalHaber').html(total2.toFixed(2));

      console.log('totalrenew2:' + totalrenew2.toFixed(2));
      console.log('monto2:' + monto2.toFixed(2));
      console.log('newtotal2:' + newtotal2.toFixed(2));
    });

    function validar() {
      var descripcion = document.getElementById('descripcion').value;

      if (descripcion.trim() == '') {
        alert('Por favor ingrese una descripcion para la partida');
      }
    }

    </script>
@endsection
