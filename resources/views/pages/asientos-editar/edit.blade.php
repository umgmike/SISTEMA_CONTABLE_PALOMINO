@extends('pages.layouts.layout')

@section('Title')
  Editar Partida No. {{ $asientos->numero_partida }}
@endsection

<style>
    .sinborde {
        border: 0;
    }    
</style>

@section('content')
  @section('nombre_ruta', 'Catálogo de edición de partida') 
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
            <div class="ribbon bg-gray-light">Daily</div>
        </div>
        
        <form class="form-horizontal" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

          @include('pages.asientos-editar.form-test')
          <div class="row offset-2">
            <div class="col-lg-10">
              <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $registro->descripcion ?? '') }}</textarea>
            </div>
          </div> 

          <div class="text-center">
            <button type="button" class="btn btn-info mt-40 btn-bg" id="registro" onclick="validar1()">Actualizar partida No. {{ old('numero_partida', $registro->numero_partida ?? '') }}</button>

          </div>
        </form>

      </div>
      <a href="" class="btn btn-info btn-block "></a>
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


        var a = 1;

            var fecha = document.getElementById("fecha_asiento").value;
            var partida = document.getElementById("numero_partida").value;
            var id_cuenta = document.getElementById("id_cuenta").value;
            var combo = document.getElementById("nombreCuenta");
            var selected = combo.options[combo.selectedIndex].text;

            var debe = document.getElementById('debe').value;
            var haber = document.getElementById('haber').value;
            var descripcion = document.getElementById('descripcion').value;

            
            var monto3 = parseFloat(debe);
            var monto4 = parseFloat(haber);

        if(debe.trim()!='' || haber.trim()!=''){
          @foreach ($detalle as $item)
            var fila = '<tr class="fila" id="row' + a + '">' + 
              '<td  > {{ $item->nombreCuenta }} </td>' +
              '<td class="monto3 text-right" id="monto3"> {{ $item->debe }}</td>' +
              '<td class="monto4 text-right" id="monto4"> {{ $item->haber }}</td>' +
              '<td class="text-center"><button type="button" name="remove" id="' + a + '" class="btn btn-outline-danger btn_remove"><i class="fa fa-trash tooltipsC"></button>' +
              '<td class="id" id="id_cuenta" style="visibility:hidden;"> {{ $item->id_cuenta }} </td>' + '</td></tr>';
              a++;
              $('#detalle').append(fila);
           @endforeach 
        } else {
                alert('Por favor rellene la informacion para guardar su informacion');
            }

          var total3 = 0;
            $('.monto3').each(function () {
                total3 +=parseFloat($(this).html());
            })
            $('.totalDebe').html(total3.toFixed(2));

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew3 = $('.totalDebe').html();
            var monto3 = $('.monto3').html();
            var newtotal3 = parseFloat(totalrenew3) - parseFloat(monto3);

            var total3=0;
            $('.monto3').each(function () {
                total3 += parseFloat($(this).html());
            });
            $('.totalDebe').html(total3.toFixed(2));

            console.log('totalrenew3:'+totalrenew3);
            console.log('monto3:'+monto3);
            console.log('newtotal3:'+newtotal3);
        });





        var total4 = 0;
            $('.monto4').each(function () {
                total4 +=parseFloat($(this).html());
            })
            $('.totalHaber').html(total4.toFixed(2));

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew4 = $('.totalHaber').html();
            var monto4 = $('.monto4').html();
            var newtotal4 = parseFloat(totalrenew4) - parseFloat(monto4);

            var total4=0;
            $('.monto4').each(function () {
                total4 += parseFloat($(this).html());
            });
            $('.totalHaber').html(total4.toFixed(2));

            console.log('totalrenew4:'+totalrenew4);
            console.log('monto4:'+monto4);
            console.log('newtotal4:'+newtotal4);
        });



        document.getElementById("debe").value = "0";

        var i = 1;

        document.addEventListener('contextmenu', function(evt) {
          evt.preventDefault();
          return false;
        });

          $("#registro").click(function() {

            var t_d  = $("#totald").text();
            var t_h  = $("#totalh").text();

              if(t_d == t_h){

                var numero_partida = $("#numero_partida").val();
                var fecha_asiento = $("#fecha_asiento").val();
                var descripcion = $("#descripcion").val();
                var total_debe = $("#totald").text();
                var total_haber = $("#totalh").text();
                var myTableArray = [];
                var URL ="{{ route('asiento2.store2') }}";
                var token = $("input[name='_token']").val();

                $("table#detalle_asientos_edit tr").each(function() {
                    var arrayOfThisRow = [];
                    var tableData = $(this).find('td');
                    if (tableData.length > 0) {
                        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
                        myTableArray.push(arrayOfThisRow);
                    }
                });


                $.ajax({
                    type: "POST",
                    url: URL,
                    dataType : 'json',
                    headers: {'X-CSRF-TOKEN': token},

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
                    error: function(msj) {
                    }
                });
              }else if(t_d == 0 && t_h == 0){
                alert('La partida está inicializada en 0, Por favor registre datos para ser almacenados con éxito')
              }
              else {
                  alert('La partida no esta cuadrada, Por favor cuádrela');
              }
          });


        $('#btn_agregar').click(function(){
            $("#ocultar").hide();
            var fecha = document.getElementById("fecha_asiento").value;
            var partida = document.getElementById("numero_partida").value;
            var id_cuenta = document.getElementById("id_cuenta").value;
            var combo = document.getElementById("nombreCuenta");
            var selected = combo.options[combo.selectedIndex].text;

            var debe = document.getElementById('debe').value;
            var haber = document.getElementById('haber').value;
            var descripcion = document.getElementById('descripcion').value;

            
            var monto3 = parseFloat(debe);
            var monto4 = parseFloat(haber);

        if(debe.trim()!=''){
            var fila = '<tr class="fila" id="row' + i + '">' + 
              '<td name="ctv" id="cuenta">' + selected + '</td>' +
              '<td class="monto3 text-right" id="monto3" >' + monto3.toFixed(2) + '</td>' +
              '<td class="monto4 text-right" id="monto4" >' + monto4.toFixed(2) + '</td>' +
              '<td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-outline-danger btn_remove"><i class="fa fa-trash tooltipsC" ></button>' +
              '<td class="id" id="id_cuenta" style="visibility:hidden;" >' + combo['value'] + '</td>' + '</td></tr>';
            i++;
            $('#detalle').append(fila);
            
        } else {
                alert('Por favor rellene la informacion para guardar su informacion');
            }

            document.getElementById("debe").value = "0";
            document.getElementById("haber").value = "0";

        });


//nombreCuenta
        $('#btn_agregar').click(function () {
            var total3 = 0;
            $('.monto3').each(function () {
                total3 +=parseFloat($(this).html());
            })
            $('.totalDebe').html(total3.toFixed(2));
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew3 = $('.totalDebe').html();
            var monto3 = $('.monto3').html();
            var newtotal = parseFloat(totalrenew3) - parseFloat(monto3);

            var total3=0;
            $('.monto3').each(function () {
                total3 += parseFloat($(this).html());
            });
            $('.totalDebe').html(total3.toFixed(2));

            console.log('totalrenew3:'+totalrenew3);
            console.log('monto3:'+monto3);
            console.log('newtotal:'+newtotal);
        });



        $('#btn_agregar').click(function () {
            var total4 = 0;
            $('.monto4').each(function () {
                total4 +=parseFloat($(this).html());
            })
            $('.totalHaber').html(total4.toFixed(2));
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });

        $(document).on('click','.btn_remove',function () {
            var totalrenew4 = $('.totalHaber').html();
            var monto4 = $('.monto4').html();
            var newtotal2 = parseFloat(totalrenew4) - parseFloat(monto4);

            var total4 = 0;
            $('.monto4').each(function () {
                total4 += parseFloat($(this).html());
            });
            $('.totalHaber').html(total4.toFixed(2));

            console.log('totalrenew4:'+totalrenew4);
            console.log('monto4:'+monto4);
            console.log('newtotal2:'+newtotal2);
        });

        function validar1(){
          var descripcion = document.getElementById('descripcion').value;

          if (descripcion.trim() == '') {
            alert('Por favor ingrese una descripcion para la partida');
          }
        }

    </script>
@endsection
