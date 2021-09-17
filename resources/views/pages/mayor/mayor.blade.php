<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LIBRO MAYOR | SYS-JOHHAN</title>
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
        font-size: 11px;
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
  
    <table class="table table-bordered">
      <tbody>
        {{$nombreCuenta = ""}}
        {{$contador = 0 }}
        {{$contador2 = sizeof($partida) }}
        {{$total = 0 }}
        {{$total2 = 0 }}


        @foreach($partida as $item)
          {{ $contador++}}

            @if ($item->condicion === 1)
              @if($item->nombreCuenta != $nombreCuenta && $contador >1)
                <tfoot>
                  <tr>
                    <td></td>
                    <td style="text-align: right;"><strong>Saldo : </strong></td>
                    <td style="text-align: right;"><strong>Q. {{ number_format($total,2) }}</strong></td> 
                    <td style="text-align: right;"><strong>Q. {{ number_format($total2,2) }}</strong></td> 
                    @if (($total - $total2) && ($total > $total2))
                      <td style="text-align: right;"><strong>Q. {{ number_format($total-$total2,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
             
                    @elseif (($total2 - $total) && ($total2 > $total))
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format($total2-$total,2) }}</strong></td>
                    @else
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                    @endif
                  </tr>
                </tfoot>
                <tr>
                  <td colspan="6" style="text-align: center;"><br></td>
                </tr>
                {{   $total = 0     }}
                {{   $total2 = 0     }}
              @endif
            @endif

            @if ($item->condicion === 1)
              @if($item->nombreCuenta != $nombreCuenta)
                {{ $nombreCuenta = $item->nombreCuenta }}
                <tr>
                  <th style="color: gray" width="33">Código</th>
                  <th style="color: gray">Cuenta</th>
                  <th style="text-align: right; color: gray" width="62">Debe</th>
                  <th style="text-align: right; color: gray" width="62">Haber</th>
                  <th style="text-align: right; color: gray" width="62">Deudor</th>
                  <th style="text-align: right; color: gray" width="62">Acreedor</th>
                </tr>
                <tr>
                  <td style="text-align: right;" colspan="1"><strong>{{ $item->codigoCuenta }}</strong></td>
                    <td colspan="5"><strong>{{ $item->nombreCuenta }}</strong></td>
                </tr>
              @endif
            @endif

              @if ($item->condicion === 1)
                <tr>
                  <td></td>
                  <td style="text-align: left;">   Partida {{ $item->numero_partida}}</td>   
                  <td style="text-align: right;">   {{ number_format($item->debe,2)  }}</td>    
                  <td style="text-align: right;">   {{ number_format($item->haber,2) }}</td>
                  <td style="text-align: right;"></td>
                  <td style="text-align: right;"></td>
                </tr>
                  {{ number_format($total = $total + $item->debe,2) }}
                  {{ number_format($total2 = $total2 + $item->haber,2) }}
              @endif

            
              @if($contador2 == $contador)
                <tfoot>
                  <tr>
                    <td ></td>
                    <td style="text-align: right;"><strong>Saldo : </strong></td>
                    <td style="text-align: right;"><strong>Q. {{ number_format($total,2)  }}</strong> </td> 
                    <td style="text-align: right;"><strong>Q. {{ number_format($total2,2) }}</strong> </td> 
                    @if (($total - $total2) && ($total > $total2))
                      <td style="text-align: right;"><strong>Q. {{ number_format($total-$total2,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
             
                    @elseif (($total2 - $total) && ($total2 > $total))
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format($total2-$total,2) }}</strong></td>
                    @else
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                      <td style="text-align: right;"><strong>Q. {{ number_format(0,2) }}</strong></td>
                    @endif
                  </tr>
                </tfoot>
                  {{  $total = 0   }}
                  {{  $total2 = 0  }}
            @endif
        @endforeach
      </tbody>
    </table>

    
  </div>
  @foreach( $asiento as $a)
  @endforeach
  <script type="text/php">
      if ( isset($pdf) ) {
        $pdf->page_script('
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $pdf->text(270, 17, "Libro Mayor", $font, 12);
        $pdf->text(210, 29, "Nombre Empresa : {{ Auth::user()->nombreEmpresa }}", $font, 12);
        $pdf->text(270, 45, "Al {{ $a->fechaf }}", $font, 12);
        $pdf->text(78, 17, "Nit: {{ Auth::user()->nit }}", $font, 12);
        $pdf->text(440, 17, "Folio: $PAGE_NUM", $font, 12);
        ');

      }
    </script>
  
</body>
</html>