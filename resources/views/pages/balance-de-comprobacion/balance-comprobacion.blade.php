<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="SYS-JOHHAN">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BALANCE DE COMPROBACIÓN | SYS-JOHHAN</title>
    <style>
      caption 
      {     
        font-size: 15px;     
        font-weight: normal;     
        padding: 0px;    
        background: #060302;
        border-top: 0px 
        solid #060302;   
        border-bottom: 0px 
        solid #060302; 
        color: #060302; 
        text-align: center;
      }

      table {
        border-collapse: collapse;
        border: 0;
      }

      .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: transparent;
        font-size: 13px;
        margin-left: 50px;
        margin-top: 45px;
        margin-right: 50px;
      }

      .table th,
      .table td {
        padding: 0.75rem;
        vertical-align: top;
        border: 0;
        padding: 0.3rem;
      }

      .table thead th {
        vertical-align: bottom;
        border: 0;6;
      }

      .table tbody + tbody {
        border: 0;
      }

      .table-sm th,
      .table-sm td {
        padding: 0.3rem;
      }

      .table-bordered {
        border: 0;
      }

      .table-bordered th,
      .table-bordered td {
        border: 0;
      }

      .table-bordered thead th,
      .table-bordered thead td {
        border-bottom-width: 2px;
        border: 0;
      }

      .table-borderless th,
      .table-borderless td,
      .table-borderless thead th,
      .table-borderless tbody + tbody {
        border: 0;
      }

      .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
        border: 0;
      }

      .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
        border: 0;
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


    @foreach( $asiento as $a)
    @endforeach


      <table class="table">
              <thead>
                <tr>
                  <th colspan="4" style="text-align: center;">BALANCE DE COMPROBACIÓN</th>
                </tr>
                <tr>
                  <th colspan="4" style="text-align: center;">Al {{ $a->fechaf }}</th>
                </tr>

                <tr>
                  <th colspan="4" style="text-align: center;">Nombre empresa : {{ Auth::user()->nombreEmpresa }}</th>
                </tr>

                <tr>
                  <th></th>
                </tr>
                <tr>
                  <th></th>
                </tr>
                <tr>
                  <th></th>
                </tr>
                <tr>
                  <th></th>
                </tr>
              </thead>

              <thead>
                <tr>
                  <th >Código</th>
                  <th >Cuenta</th>
                  <th style="text-align: right;" width="90">Debe</th>
                  <th style="text-align: right;" width="90">Haber</th>
                </tr>
              </thead>

              <tbody>
              {{ $total = 0 }}
              {{ $total2 = 0 }}
                @foreach($reporte as $item)
                    <tr>
                      <td width="35"> {{ $item->codigoCuenta }}</td>
                      <td style="text-align: left;"> {{ $item->nombreCuenta }}</td>
                    @if ($item->debe > $item->haber)
                      <td style="text-align: right;">{{ number_format($item->debe-$item->haber,2) }}</td>
                      <td style="text-align: right;"></td>
                    @elseif ($item->haber > $item->debe)
                      <td style="text-align: right;"></td>
                      <td style="text-align: right;">{{ number_format($item->haber-$item->debe,2) }}</td>
                    @endif
                    </tr>

                    @if ($item->debe > $item->haber)
                      {{ $total += ($item->debe-$item->haber) }}
                    @elseif ($item->haber > $item->debe)
                      {{ $total2 += ($item->haber-$item->debe) }}
                    @endif
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th><p align="right">BALANCE :</p></th>
                  <th><p align="right">Q.   {{ number_format($total,2) }}</p></th>
                  <th><p align="right">Q.  {{ number_format($total2,2) }}</p></th>
                </tr>
              </tfoot>
            </table>

    <div>
    <script type="text/php">
      if ( isset($pdf) ) {
        $pdf->page_script('
        $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
        $pdf->text(78, 35, "NIT: {{ Auth::user()->nit }}", $font, 10);
        $pdf->text(460, 35, "FOLIO: $PAGE_NUM", $font, 10);
        ');

      }
    </script>
  </div>

</body>
</html>