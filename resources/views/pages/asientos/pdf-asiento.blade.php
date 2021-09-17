<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LIBRO DIARIO | OFICINA CONTABLE PALOMINO</title>
    <style>

      body {
            margin: 1.5cm 1.5cm 1.5cm;
      }

      table {
        border-collapse: collapse;
      }

      .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
        font-size: 13px;
      }

      .table th,
      .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        padding: 0.3rem;
      }

      .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
      }

      .table tbody + tbody {
        border-top: 2px solid #dee2e6;
      }

      .table-sm th,
      .table-sm td {
        padding: 0.3rem;
      }

      .table-bordered {
        border: 1px solid #dee2e6;
      }

      .table-bordered th,
      .table-bordered td {
        border: 1px solid #dee2e6;
      }

      .table-bordered thead th,
      .table-bordered thead td {
        border-bottom-width: 2px;
      }

      .table-borderless th,
      .table-borderless td,
      .table-borderless thead th,
      .table-borderless tbody + tbody {
        border: 0;
      }

      .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
      }

      .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
      }

      th {
        text-align: inherit;
      }

      .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
      }

      .table-responsive > .table-bordered {
        border: 0;
      }
    </style>
</head>

<body>

  <div>
    <table class="table">
      <tbody>
        {{$id_asiento = ""}}
        {{$contador = 0 }}
        {{$contador2 = sizeof($partida) }}
        {{$total = 0 }}
        {{$total2 = 0 }}


        @foreach($partida as $item)
          {{ $contador++}}

            @if($item->id_asiento != $id_asiento && $contador >1)
              @if ($item->condicion === 1)
                <tfoot>
                  <tr>
                    <td style="text-align: right;" width="33"></td>
                    <td style="text-align: right;"><strong>Totales : </strong></td>
                    <td style="text-align: right;" width="100"><strong>Q. {{   number_format($total,2)      }}</strong></td> 
                    <td style="text-align: right;" width="100"><strong>Q. {{   number_format($total2,2)      }}</strong></td> 
                  </tr>
                </tfoot>
                <tr>
                  <td colspan="4" style="text-align: center;"><br>
                  </td>
                </tr>
                {{   $total = 0     }}
                {{   $total2 = 0     }}
              @endif
            @endif


            @if($item->id_asiento != $id_asiento)

              @if ($item->condicion === 1)
                
                {{ $id_asiento=$item->id_asiento }}
                    <tr>
                      <td colspan="4"><strong>Fecha de partida : </strong>{{ $item->fecha_asiento }}</td>
                    </tr>
                    <tr>
                      <td colspan="4"><strong>No. de partida : </strong>{{ $item->numero_partida }}</td>
                    </tr>
                    <tr>
                      <td colspan="4"><strong>Descripción : </strong>{{ $item->descripcion }}</td>
                    </tr>
                    <tr>
                      <th style="text-align: left;" width="33">Código</th>
                      <th style="text-align: left;">Cuenta</th>
                      <th style="text-align: right;" width="100">Debe</th>
                      <th style="text-align: right;" width="100">Haber</th>
                    </tr>
              @endif
            @endif
            
            @if ($item->condicion === 1)
                <tr>
                  <td style="text-align: left;" width="33"> {{ $item->codigoCuenta }} </td> 
                  <td style="text-align: left;"> {{ $item->nombreCuenta }}</td>  
                  <td style="text-align: right;" width="100">   {{   number_format($item->debe,2)    }}</td>    
                  <td style="text-align: right;" width="100">   {{   number_format($item->haber,2)   }}</td>
                </tr>
                  {{ $total = $total + $item->debe }}
                  {{ $total2 = $total2 + $item->haber }}

            @endif

 
            @if($contador2 == $contador)
                <tfoot>
                  <tr>
                    <td style="text-align: right;" width="33"></td>
                    <td style="text-align: right;"><strong>Totales : </strong></td>
                    <td style="text-align: right;" width="100"><strong>Q. {{   number_format($total,2)   }}</strong> </td> 
                    <td style="text-align: right;" width="100"><strong>Q. {{   number_format($total2,2)  }}</strong> </td> 
                  </tr>
                </tfoot>
                  {{  $total = 0   }}
                  {{  $total2 = 0  }}
            @endif
        @endforeach
      </tbody>
    </table>
  </div>

  <script type="text/php">
    if ( isset($pdf) ) {
      $pdf->page_script('
      $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
      $pdf->text(270, 23, "Libro Diario", $font, 12);
      $pdf->text(210, 33, "Nombre Empresa : {{ Auth::user()->nombreEmpresa }}", $font, 12);
      $pdf->text(78, 23, "Nit: {{ Auth::user()->nit }}", $font, 12);
      $pdf->text(440, 23, "Folio: $PAGE_NUM", $font, 12);
      ');

    }
  </script>
  
</body>
</html>